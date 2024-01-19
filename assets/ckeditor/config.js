/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
//	config.language = 'es';
//	config.uiColor = '#F7B42C';
	config.height = 200;
	config.toolbarCanCollapse = true;

	config.toolbar = [
		{name:'clipboard',items:['Cut','Copy','Paste','Pastetext','PasteFromWord','-','Undo','Redo']},

		{name:'editing',items:['Scaty']},

		{name:'links',items:['Link','Unlink','Anchor']},
	
		{name:'tools',items:['Maximize']},
		
		'/',
		{name:'basicstyles',items:['Bold','Italic','Underline','Strike','-','RemoveFormat']},

		{name:'paragraphs',items:['NumberedList','BulletedList','Outdent','Indent','-','Bloctquote']},
		{name:'styles',items:['Styles','Format']},
		
	];
};
	

