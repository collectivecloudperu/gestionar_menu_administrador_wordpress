// Agregar el botón Vista previa al administrador de wordpress
$current_url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
if (strpos($current_url,'/wp-admin') !== false) {

	add_action( 'admin_bar_menu', 'mi_nuevo_boton', 999 );
	function mi_nuevo_boton( $wp_admin_bar ) {
		$args = array(
			'id'    => 'vpb',
			'title'  => '<span class="ab-icon dashicons dashicons-admin-site" style="top:2px;"></span>'.__( 'Vista Previa', 'vp' ),
			'href'  => 'http://blog.collectivecloudperu.com/',
			'meta'  => array( 'class' => 'vp_icon', 'target' => '_blank', 'title' => 'Vista Previa' )
		);
		$wp_admin_bar->add_node( $args );
	}
}
else{
	# nada...
}

// Ocultar el botón Vista previa que viene por default en el administrador de wordpress
add_action( 'admin_bar_menu', 'ocultar_boton_vista_previa', 999 );
function ocultar_boton_vista_previa( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'view-site' );
}

// Editar logo en el administrador de wordpress
add_action( 'admin_bar_menu', 'editar_logo_administrador', 999 );
function editar_logo_administrador( $wp_admin_bar ) {
	$args = array(
		'id'     => 'site-name', 
		'title'  => 'Blog Collective Cloud Perú', 	        
		'href'  => 'http://blog.collectivecloudperu.com/wp-admin/',
	);
	$wp_admin_bar->add_node( $args );
}
