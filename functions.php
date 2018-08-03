<?php
//** Hojas de estilos **//
	function aurora_styles()
        {

		wp_enqueue_style( 'style', get_stylesheet_uri());  //Agrea mi archivo style.css oja de estilo principal



        }

       add_action( 'wp_enqueue_scripts', 'aurora_styles' ); // Activa la funcion de arriba

	   // Activa imagenes destacadas
       add_theme_support('post-thumbnails');

	   /** Menu de navegacion **/
       register_nav_menus( array(
       'primary' => __( 'Primary Menu', 'aurora' ),) );
    
      register_nav_menus( array(
       'Pie' => __( 'Pie', 'aurora' ),) );

		
add_action('init', 'cyb_session_start', 1);
function cyb_session_start() {
    if( ! session_id() ) {
        session_start();
    }
}







add_action('login_head', 'mi_logo_inicio');
function mi_logo_inicio() {
	echo '<style type="text/css">
		.login h1 a{background-image:url('.get_bloginfo('template_directory').'/img/logo-inicio.png) !important;
   background-size:contain;  width:320px; height:70px; background:red; background-repeat: no-repeat;
}
	</style>';
}
 
add_action('login_head', 'mi_logo_inicio');	

	function aurora_widgets(){
	
		register_sidebar(array(
		'name'=>__('sec1'),
		'id'=>'sec1',
		'descripcion' => 'Zona editable pie de pagina',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=>'<span style="display:none;">',
		'after_title'=> '</span>'
		)
		);

		register_sidebar(array(
		'name'=>__('sec2'),
		'id'=>'sec2',
		'descripcion' => 'Zona editable pie de pagina',
		'before_widget'=>'<div id="%1$s"">',
		'after_widget'=> '</div>',
		'before_title'=>'<div style="display:none;">',
		'after_title'=> '</div>'
		)
		);register_sidebar(array(
		'name'=>__('sec3'),
		'id'=>'sec3',
		'descripcion' => 'zona editable pie de pagina',
		'before_widget'=>'<div id="%1$s">',
		'after_widget'=> '</div>',
		'before_title'=>'<div style="display:none;">',
		'after_title'=> '</div>'
		)
		);
		register_sidebar(array(
		'name'=>__('redes'),
		'id'=>'redes',
		'descripcion' => 'Redes',
		'before_widget'=>'',
		'after_widget'=> '',
		'before_title'=>'<span style="display:none;">',
		'after_title'=> '</span>'
		)
		);
		register_sidebar(array(
		'name'=>__('contacto'),
		'id'=>'contacto',
		'descripcion' => 'Contacto',
		'before_widget'=>'<div id="%1$s">',
		'after_widget'=> '</div>',
		'before_title'=>'<div style="display:none;">',
		'after_title'=> '</div>'
		)
		);
	}
	add_action ('widgets_init','aurora_widgets');

 ?>
