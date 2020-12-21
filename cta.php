<?php

use Inc\Api\BlockStudioApi as Api;


// cta.php


	/*
	Title: Test Block
	Description: Simple heading.
	Category: blockstudio
	Icon: editor-paragraph
	Mode: preview
	SupportsAlign: false
	SupportsMode: false
*/


    // Create Fields via Api between BlockStudio and AcfBuilder
    $text = Api::text( 'text_field', '1. Textfeld' );
    $text_two = Api::text( 'text_two', '2. Textfeld' );
    $text_three = Api::text( 'text_three', '3.Textfeld' );
    $text_four = Api::text( 'text_for', 'Neues Textfeld', 'Akzeptiert Args', '5','was geht' );



    // populate Blockstudio $fields
	$fields = array_merge(

	        $text,
            $text_two,
            $text_three,
            $text_four,
    );


    // returns the correctly escaped acf value
    // second param lets you choose between html, url, attr, js etc.

	$heading = Api::sanitize($text, 'html');
	$text_field = Api::sanitize($text_two, 'html');


?>

<div class="<?php echo $block['blockstudio_center']; ?>">
	<?php if ( $heading ): ?>
        <h1 class="<?php echo $block['blockstudio_text_2xl']; ?>">
			<?php echo $heading; ?>
        </h1>
	<?php endif; ?>
	<?php if ( $text_field ): ?>
        <p class="<?php echo $block['blockstudio_text_md']; ?> bsx-text-gray-600 2xl:bsx-max-w-none inter">
			<?php echo $text_field; ?>
        </p>
	<?php endif; ?>
</div>




