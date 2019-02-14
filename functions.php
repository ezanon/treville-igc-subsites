<?php 

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' ); 

function enqueue_parent_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' ); 
} 

function my_mime_types($mime_types){
$mime_types[‘zip’] = ‘application/zip’;
$mime_types[‘rar’] = ‘application/x-rar-compressed’;
$mime_types[‘tar’] = ‘application/x-tar’;
$mime_types[‘gz’] = ‘application/x-gzip’;
$mime_types[‘gzip’] = ‘application/x-gzip’;
$mime_types[‘tiff’] = ‘image/tiff’;
$mime_types[‘tif’] = ‘image/tiff’;
$mime_types[‘bmp’] = ‘image/bmp’;
$mime_types[‘svg’] = ‘image/svg+xml’;
$mime_types[‘psd’] = ‘image/vnd.adobe.photoshop’;
$mime_types[‘ai’] = ‘application/postscript’;
//$mime_types[‘indd’] = ‘application/x-indesign’; // not official, but might still work
$mime_types[‘eps’] = ‘application/postscript’;
$mime_types[‘rtf’] = ‘application/rtf’;
$mime_types[‘txt’] = ‘text/plain’;
$mime_types[‘wav’] = ‘audio/x-wav’;
$mime_types[‘csv’] = ‘text/csv’;
$mime_types[‘xml’] = ‘application/xml’;
//$mime_types[‘flv’] = ‘video/x-flv’;
//$mime_types[‘swf’] = ‘application/x-shockwave-flash’;
$mime_types[‘vcf’] = ‘text/x-vcard’;
//$mime_types[‘html’] = ‘text/html’;
//$mime_types[‘htm’] = ‘text/html’;
//$mime_types[‘css’] = ‘text/css’;
//$mime_types[‘js’] = ‘application/javascript’;
$mime_types[‘ico’] = ‘image/x-icon’;
//$mime_types[‘otf’] = ‘application/x-font-otf’;
//$mime_types[‘ttf’] = ‘application/x-font-ttf’;
//$mime_types[‘woff’] = ‘application/x-font-woff’;
//$mime_types[‘ics’] = ‘text/calendar’;
return $mime_types;
}
add_filter(‘upload_mimes’, ‘my_mime_types’, 1, 1);

// Criar post types
function create_post_type() {
    register_post_type('historico', array(
        'labels' => array(
            'name' => __('Histórico'),
            'singular_name' => __('História')
        ),
        'supports' => array(
            'title', 'custom-fields'
        ),
        'public' => true,
        'exclude_from_search' => false,
        'menu_position' => 5,
        'has_archive' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'rewrite' => array('slug' => 'historico')
            )
    );
}
add_action('init', 'create_post_type');

// campos personalizados para o historico
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_5c6150d2e8a27',
	'title' => 'Histórico',
	'fields' => array(
		array(
			'key' => 'field_5c6165a2941a7',
			'label' => 'Data',
			'name' => 'data',
			'type' => 'text',
			'instructions' => 'Utilizar formatos: YYYY, YYYY/MM ou YYYY/MM/DD para a ordenação funcionar adequadamente.',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5c61663f941a9',
			'label' => 'Resumo',
			'name' => 'resumo',
			'type' => 'text',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5c61665f941aa',
			'label' => 'Texto',
			'name' => 'texto',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'wpautop',
		),
		array(
			'key' => 'field_5c616697941ab',
			'label' => 'Imagem',
			'name' => 'imagem',
			'type' => 'image',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => 'jpg, jpeg, png',
		),
		array(
			'key' => 'field_5c616705941ac',
			'label' => 'Arquivo',
			'name' => 'arquivo',
			'type' => 'file',
			'instructions' => 'Arquivo PDF significativo ao item.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => 'pdf',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'historico',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array(
		0 => 'permalink',
		1 => 'the_content',
		2 => 'excerpt',
		3 => 'discussion',
		4 => 'comments',
		5 => 'revisions',
		6 => 'slug',
		7 => 'author',
		8 => 'format',
		9 => 'page_attributes',
		10 => 'featured_image',
		11 => 'categories',
		12 => 'tags',
		13 => 'send-trackbacks',
	),
	'active' => 1,
	'description' => '',
));
endif;