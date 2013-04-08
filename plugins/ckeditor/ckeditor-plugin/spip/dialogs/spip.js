/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

function createXMLHttpRequest()
	{
		// In IE, using the native XMLHttpRequest for local files may throw
		// "Access is Denied" errors.
		if ( !CKEDITOR.env.ie || location.protocol != 'file:' )
			try { return new XMLHttpRequest(); } catch(e) {}

		try { return new ActiveXObject( 'Msxml2.XMLHTTP' ); } catch (e) {}
		try { return new ActiveXObject( 'Microsoft.XMLHTTP' ); } catch (e) {}

		return null;
	};

function checkStatus( xhr ) {
	// HTTP Status Codes:
	//	 2xx : Success
	//	 304 : Not Modified
	//	   0 : Returned when running locally (file://)
	//	1223 : IE may change 204 to 1223 (see http://dev.jquery.com/ticket/1450)

	return ( xhr.readyState == 4 &&
				(	( xhr.status >= 200 && xhr.status < 300 ) ||
					xhr.status == 304 ||
					xhr.status === 0 ||
					xhr.status == 1223 ) );
};


var getResponseText = function( xhr ) {
	if ( checkStatus( xhr ) )
		return xhr.responseText;
	return null;
};

var getResponseXml = function( xhr ) {
	if ( checkStatus( xhr ) ) {
  	  var xml = xhr.responseXML;
		return new CKEDITOR.xml( xml && xml.firstChild ? xml : xhr.responseText );
	}
	return null;
};

var spipDialog ;

function ajaxLoad( url, callback, getResponseFn ) {
	var async = !!callback;
	var xhr = createXMLHttpRequest();

	if ( !xhr )
		return null;

	xhr.open( 'GET', url, async );

	if ( async ) {
		// TODO: perform leak checks on this closure.
		/** @ignore */
		xhr.onreadystatechange = function() {
			if ( xhr.readyState == 4 ) {
				callback( getResponseFn( xhr ) );
				xhr = null;
			}
		};
	}

	xhr.send(null);
	return async ? '' : getResponseFn( xhr );
};


function dumpObj(obj, name, indent, depth) {
	try {
		if (depth < 0) {
			return indent + name + ": <Maximum Depth Reached>\n";
		}
		if (typeof obj == "object") {
			var child = null;
			var output = indent + name + "\n";
			indent += "\t";
			for (var item in obj)
			{
				try {
					child = obj[item];
				} catch (e) {
					child = "<Unable to Evaluate>";
				}
				if (typeof child == "object") {
					output += dumpObj(child, item, indent, depth - 1);
				} else {
					output += indent + item + ": " + child + "\n";
				}
			}
			return output;
		} else {
			return obj;
		}
	} catch (e) {
		return '<error>' ;
	}
}

function numericEntitiesDecode(st) {
	st = st.replace(/&#(\d+);/g,
				function() { return String.fromCharCode(arguments[1]); }
			) ;
	st = st.replace(/&nbsp;/ig, 
				function() { return String.fromCharCode('160') ; }
			) ;
	return st ;
}

function loadSelectFromSpip(dialog, page, tabId, itemId) {
	var data = ajaxLoad(page, null, getResponseText) ;
	var line ;
	var ndx,sep ;
	var cpt = 0 ;

	var mySelect = dialog.getContentElement(tabId, itemId) ;
	mySelect.clear() ;

	if (!data) 
		return ;

	while ((ndx = data.indexOf('\n')) != -1) {
		line = data.substring(0, ndx) ; // ligne courante
		sep = line.indexOf('|') ;
		if (sep != -1) {
			mySelect.add(numericEntitiesDecode(line.substring(0,sep)),cpt) ;
		}
		data = data.substring(ndx+1, data.length) ;
		// FIX discutable permettant de récupérer le champ text d'un champ <option>
		dialog.options[tabId][itemId][cpt] = line ;
		cpt++ ;
	}
	// data : derniere ligne
	sep = data.indexOf('|') ;
	if (sep != -1) {
		mySelect.add(numericEntitiesDecode(data.substring(0,sep)), cpt) ;
		// FIX discutable permettant de récupérer le champ text d'un champ <option>
		dialog.options[tabId][itemId][cpt] = data ;
	}
}

function ucfirst(st) {
	var parts = st.match(/^(.)(.*)$/) ;
  	return parts[1].toUpperCase() + parts[2] ;
}

function updateArticle(dialog, editor) {
	if (dialog) {
		var type = dialog.getValueOf('tab1', 'spipType') ;
		var spipArticle = dialog.getContentElement('tab1', 'spipArticle') ;
		if ((type == 'article') || (type == 'breve')) {
			if (type == 'article') {
				spipArticle.setLabel(editor.lang.spip.article+' :') ;
			} else {
				spipArticle.setLabel(editor.lang.spip.shortnews+' :') ;
			}
			spipArticle.getElement().show() ;
			var rubrique = dialog.getValueOf('tab1', 'spipRubrique') ;

			var pos = dialog.options['tab1']['spipRubrique'][rubrique].lastIndexOf('|') ;
			if (pos!=-1) {
				loadSelectFromSpip(dialog, CKEDITOR.spip_absolutepath+'/spip.php?page='+type+'s-links&id_rubrique='+dialog.options['tab1']['spipRubrique'][rubrique].substring(pos+1), 'tab1', 'spipArticle') ;
			}
		} else {
			spipArticle.setLabel('') ;
			spipArticle.getElement().hide() ;
		}
	}
}

CKEDITOR.dialog.add( 'spip', function( editor )
{
	var dialog ;

	var skipPreviewChange = true;

	return {
		title : editor.lang.spip.title,
		minWidth : 360,
		minHeight : 150,
		onLoad : function() // tiré de uiColor
		{
			spipDialog = dialog = this;
			this.options = {'tab1' : { 'spipRubrique' : {}, 'spipArticle' : {} } } ; // ce serait mieux de savoir comment récupérer le champ text d'un champ 'option' d'un <select> que d'utiliser ce FIX mais je ne trouve pas.
			this.setupContent() ;

			// #3808
			if ( CKEDITOR.env.ie7Compat )
				dialog.parts.contents.setStyle( 'overflow', 'hidden' );
		},
		onShow : function () {
			loadSelectFromSpip(this, CKEDITOR.spip_absolutepath+'/spip.php?page=rubriques-links', 'tab1', 'spipRubrique') ;
			var editor = this.getParentEditor() ;
			updateArticle(this,editor) ;
			var sel = editor.getSelection() ; // on récupère la sélection
			if (sel.getType() == CKEDITOR.SELECTION_NONE) { // y'a rien de dans

			} else if (sel.getType() == CKEDITOR.SELECTION_TEXT) { // c'est une partie d'un ou plusieurs éléments
				var first = sel.getRanges()[0].extractContents().getFirst()	;
				if (first) {
					this.setValueOf('tab1', 'linkText', first.getText() ) ;
				}
			} else { // c'est un élément
				var element = sel.getSelectedElement() ;
				if ((element.getName() == 'img') && (element.getParent().getName() == 'a')) {
					element = element.getParent() ;
				}
				if (element.getName() == 'a') { // on a déja un <a > sélectionné, on regarde si c'est déjà un lien spip :
					var href = element.getAttribute('href') ;
					var re = new RegExp("spip\\.php\\?id_(\\w+)=(\\d+)") ; // on récupére les éléments de l'url spip
					var m = re.exec(href) ;
					if (m != null) {
						this.setValueOf('tab1', 'urlSpip', m[2]) ;  // on remplit les champs correspondants
					}
				}
				this.setValueOf('tab1', 'linkText', element.getText()) ;
			}
		},
		onOk : function () {
			
			var idUrl, urlSpip, defaultText, r,l ;
		  	if (this.getValueOf('tab1', 'spipType') == 'rubrique') {
				idUrl = this.getValueOf('tab1', 'spipRubrique') ;
				defaultText = this.options['tab1']['spipRubrique'][idUrl] ;
				r = defaultText.indexOf('|') ;
				l = defaultText.lastIndexOf('|') ;
				urlSpip = defaultText.substring(r+1,l) ;
				defaultText = defaultText.substring(0,r) ;
			} else {
				idUrl = this.getValueOf('tab1', 'spipArticle') ;
				defaultText = this.options['tab1']['spipArticle'][idUrl] ;
				r = defaultText.indexOf('|') ;
				l = defaultText.lastIndexOf('|') ;
				urlSpip = defaultText.substring(r+1,l) ;
				defaultText = defaultText.substring(0,r) ;

			}
			defaultText = defaultText.replace(/^(\s|&#160;)+/g, '') ;
			var pos = urlSpip.indexOf('|') ;
			if (pos != '-1') {
				urlSpip = urlSpip.substring(0,pos) ;
			}
			var editor = this.getParentEditor() ;
			var sel = editor.getSelection() ;
			var element = sel.getSelectedElement() ;
			var text = this.getValueOf('tab1', 'linkText') ;
			text=( text ? text : defaultText ) ;

			if (element && (element.getName() == 'a')) { // on a déja un <a >, on l'utilise :
				element.setText(text) ;
				element.setAttribute('_cke_saved_href', urlSpip) ;
				editor.insertElement(element) ;
			} else if (element && (element.getName() == 'img')) {
				var link = editor.document.createElement( 'a' );
				link.setAttribute('href', urlSpip) ;
				link.setText(text) ;
				link.append(element.clone()) ;
				editor.insertElement(link) ;
			} else { // sinon, on en crée un :
				var link = editor.document.createElement( 'a' );
				link.setAttribute('href', urlSpip) ;
				link.setText(text) ;
				editor.insertElement(link) ;
			}

		},
		contents : [
			{
				id : 'tab1',
				label : '',
				title : '',
				expand : true,
				padding : 0,
				elements :
				[
				{
					id : '',
					type : 'vbox',
					children :
					[
					{
						id : 'linkText',
						type : 'text',
						label : editor.lang.spip.linktext
					},
					{
						id : '',
						type : 'hbox',
						children :
						[
							{
								id : 'spipType',
								label : editor.lang.spip.linktype,
								type : 'select',
								items :
									[
										[editor.lang.spip.article, 'article'],
										[editor.lang.spip.section, 'rubrique'],
										[editor.lang.spip.shortnews, 'breve']
									],
								onChange: function() {
									updateArticle(dialog, editor) ;
								}
							},
							{
								id : 'spipRubrique',
								label : editor.lang.spip.section+' :',
								type : 'select',
								items : [],
								onChange: function() {
									updateArticle(dialog, editor) ;
								}

							}
						]
					},
					{
						id : 'spipArticle',
						label : editor.lang.spip.article+' :',
						type : 'select',
						items : []
					}
					]
				}
				]
			}
		],
		buttons : [ CKEDITOR.dialog.okButton, CKEDITOR.dialog.cancelButton ]
	};
} );
