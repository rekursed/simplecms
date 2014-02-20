/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
CKEDITOR.config.protectedSource.push(/<\?[\s\S]*?\?>/g);
config.enterMode = CKEDITOR.ENTER_BR;
config.shiftEnterMode = CKEDITOR.ENTER_BR;
CKEDITOR.config.allowedContent = true; 
CKEDITOR.config.entities  = false;
CKEDITOR.config.basicEntities = false;
CKEDITOR.config.entities_greek = false;
CKEDITOR.config.entities_latin = false;

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
