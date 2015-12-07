<?php


  class MilEditor_Initialize {
	function __construct($file){
      //add_action( 'wp_head', array($this, 'meta_init'),1 );
      //add_action( 'init', array($this, 'kingkongboard_localization') );
      add_action( 'admin_menu', array($this, 'mileditor_addMenu') );
      add_action( 'admin_enqueue_scripts', array($this, 'mileditor_adminStyle') ); 
      add_action( 'wp_enqueue_scripts', array($this, 'mileditor_style'));
      //add_action( 'admin_init', array($this, 'check_current_kkb_version') );
      //add_filter( 'load_textdomain_mofile', array($this, 'replace_kkb_default_language_files'), 10, 2);
    }
	
	public function mileditor_addMenu(){
      add_menu_page( 'MILeditor', 'MIL Editor', 'administrator', 'mileditor', 'mileditor_menu_curriculum', MILEDITOR_PLUGINS_URL.'/images/kingkong.svg' );
	  add_submenu_page( 'mileditor', 'MIL Curriculum', '교과과정편집', 'administrator', 'mileditor');
	  add_submenu_page( 'mileditor', 'MIL Subject', '과목편집', 'administrator', 'mileditor_subject', 'mileditor_menu_subject');
    }

    public function mileditor_adminStyle(){
        wp_enqueue_style('mileditor_admin_style', MILEDITOR_PLUGINS_URL."/frontend/css/admin.style.css");
        wp_enqueue_script('mileditor_admin_js', MILEDITOR_PLUGINS_URL."/backend/js/admin.script.js");
    }
	
	public function mileditor_style(){
		wp_enqueue_script('jquery');
        wp_enqueue_style('mileditor_style', MILEDITOR_PLUGINS_URL."/frontend/css/mileditor.style.css", 10, 1.0);
        wp_enqueue_script('mileditor_js', MILEDITOR_PLUGINS_URL."/backend/js/mileditor.script.js", array('jquery'), false, true);
		wp_localize_script( 'mileditor_js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'params' => $params));
    }

    static function MilEditor_Active_Create_DB(){

        global $wpdb;

        $db_table = $wpdb->prefix . "mileditor_meta";
 
        if($wpdb->get_var("show tables like '$db_table'") !== $db_table){
            //create sql
            $sql =  "CREATE TABLE ". $db_table . " (
                          ID mediumint(12) NOT NULL AUTO_INCREMENT,
                          page_id mediumint(12) NOT NULL,
                          page_mandatory_color varchar(10) NOT NULL,
						  page_core_color varchar(10) NOT NULL,
						  page_support_color varchar(10) NOT NULL,
                          UNIQUE KEY ID (ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
	
	static function subject_table_install(){

        global $wpdb;

        $table_name = $wpdb->prefix . "mil_subject";
 
        if($wpdb->get_var("show tables like '$table_name'") !== $table_name){
            //create sql
            $sql =  "CREATE TABLE ". $table_name . " (
                          ID mediumint(12) NOT NULL AUTO_INCREMENT,
                          code varchar(10) NOT NULL,
						  name varcahr(30) NOT NULL,
						  detail text NOT NULL,
						  semester INT NOT NULL,
						  tool varchar(30),
						  isMandatory INT NOT NULL DEFAULT 0,
						  relateSubject TEXT,
						  PRIMARY KEY (code),
                          UNIQUE KEY ID (ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }
    }
	
	static function subject_position_table_install() {
		global $wpdb;

		$table_name = $wpdb->prefix . "mil_position";
		
		if($wpdb->get_var("show tables like '$table_name'") !== $table_name){

			$sql = "CREATE TABLE ". $table_name . " (
			  position varchar(5) NOT NULL,
			  subject_code varchar(10) NOT NULL,
			  PRIMARY KEY (position)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
		}
	}

  }

  $Initializing = new MilEditor_Initialize(MILEDITOR_ROOT);
?>