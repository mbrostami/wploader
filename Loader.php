<?php 
global $wp_filter, $wp_actions, $merged_filters, $wp_current_filter,$current_blog,$plugins,$status ,$page ,$usersearch ,$post ,$submenu ,$wp_post_types,$hook_suffix,$_wp_submenu_nopriv,$menu,$allowedentitynames,$wp, $wp_query, $wp_the_query,$wpdb,$wp_rewrite;
$user_login = ''; 
global $typenow,$taxonomy,$post_type,$post_id ,$comment_status ,$theme ,$user_ID ,$comment,$search   ;
global $action,$url ,$return,$_wp_admin_css_colors ,$wp_http_referer ,$user_id ,$current_user ,$wp_roles ;
if($params['action'] == 'wp-login.php')
{
	$_SERVER['PHP_SELF'] = '/wp-login.php';
    require APPLICATION_PATH.'/../library/wordpress/wp-login.php';
}elseif($params['action'] == 'wp-admin')
{
    if(isset($params['filename']))
    {
        if(preg_match("/^[a-z0-9-_]+$/i", $params['filename']))
        {
            if(isset($params['foldername']) && preg_match("/^[a-z0-9-_\/]+$/i", $params['foldername']))
            {
            	$_SERVER['PHP_SELF'] = "/wp-admin/".$params['foldername'].$params['filename'].'.php';
                require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['foldername'].$params['filename'].'.php';
            }else{
            	$_SERVER['PHP_SELF'] = "/wp-admin/".$params['filename'].'.php';
                require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['filename'].'.php';
            }
        }else{
        	$_SERVER['PHP_SELF'] = "/wp-admin/index.php";
            require APPLICATION_PATH.'/../library/wordpress/wp-admin/index.php';
        }
    }else{
    	$_SERVER['PHP_SELF'] = "/wp-admin/index.php";
        require APPLICATION_PATH.'/../library/wordpress/wp-admin/index.php';
    }
}else{
    if(isset($params['filename']))
    {
        if(preg_match("/^[a-z0-9-_]+$/i", $params['filename']))
        {
            if(isset($params['foldername']) && preg_match("/^[a-z0-9-_\/]+$/i", $params['foldername']))
            {
            	$_SERVER['PHP_SELF'] = '/wp-admin/'.$params['foldername'].$params['filename'].'.php';
                require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['foldername'].$params['filename'].'.php';
            }else{
                if(is_file(APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['filename'].'.php'))
                {
                	$_SERVER['PHP_SELF'] = '/wp-admin/'.$params['filename'].'.php';
                    require APPLICATION_PATH.'/../library/wordpress/wp-admin/'.$params['filename'].'.php';
                }
                elseif(is_file(APPLICATION_PATH.'/../library/wordpress/'.$params['filename'].'.php'))
                {
                	$_SERVER['PHP_SELF'] = $params['filename'].'.php';
                    require APPLICATION_PATH.'/../library/wordpress/'.$params['filename'].'.php';
                }
            }
        }else{
        	$_SERVER['PHP_SELF'] = '/wp-admin/index.php';
            require APPLICATION_PATH.'/../library/wordpress/wp-admin/index.php';
        }
    }else{
    	$_SERVER['PHP_SELF'] = '/index.php';
        require APPLICATION_PATH.'/../library/wordpress/index.php';
    }
}