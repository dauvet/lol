<?php

// register settings page
add_action( 'admin_menu', 'register_pages_menu' );
function register_pages_menu(){
    add_menu_page( 'Landing page', 'Landing settings', 'manage_options', 'landing_settings', 'landing_settings_render',
        get_template_directory_uri() . '/images/landing-page.png', 6 );
    add_menu_page( 'Home page', 'Home settings', 'manage_options', 'home_settings', 'home_settings_render',
        get_template_directory_uri() . '/images/home-page.png', 7 );
    add_menu_page( 'Q/A', 'Q/A', 'manage_options', 'qa_management', 'qa_management_render',
        get_template_directory_uri() . '/images/qa-management.png', 8 );

    add_action( 'admin_enqueue_scripts', 'enqueue_qa_js' );

}

function enqueue_qa_js()
{
    wp_enqueue_script( 'qa-script', get_template_directory_uri()  . '/inc/qa.js');
    wp_localize_script( 'qa-script', 'qa_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'delete_confirm_msg' => __('Do you want to delete this QA?','responsive'),
    ) );
    wp_enqueue_style( 'qa-style', get_template_directory_uri()  . '/inc/qa.css');
}

// landing page
function landing_settings_render()
{
    global $landing_settings_keys;
    if (isset($_POST['settings']) && check_admin_referer( 'landing-settings')) {
        $settings = $_POST['settings'];
        foreach($landing_settings_keys as $key=>$tag){
            if (isset($settings[$key])){
                update_option(LOL_PREFIX . $key, $settings[$key]);
            }
        }
        ?>
        <div id="setting-error-settings_updated" class="updated settings-error">
            <p><strong><?php _e('Settings saved.','responsive'); ?></strong></p></div>
    <?php
    }else{
        foreach($landing_settings_keys as $key=>$tag){
            $settings[$key] = get_option(LOL_PREFIX . $key);
        }
    }
    ?>
    <div class="wrap">
        <h2>Landing page settings</h2>
        <form method="post" action="">
            <?php wp_nonce_field( 'landing-settings'); ?>
            <table class="form-table">
                <tbody>
                <?php foreach($landing_settings_keys as $key=>$tag): ?>
                    <tr>
                        <th><?php echo $tag['title']; ?></th>
                        <td>
                            <?php if ($tag['type'] == 'text'): ?>
                                <input class="regular-text" type="text" name="settings[<?php echo $key; ?>]" value="<?php if(isset($settings[$key])) echo $settings[$key];  ?>">
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'responsive'); ?>"></p>
        </form>
    </div>
<?php
}

function landing_settings_get($key){
    return get_option(LOL_PREFIX . $key);
}

// home page
function home_settings_render()
{
    global $home_settings_keys;
    if (isset($_POST['settings']) && check_admin_referer( 'home-settings')) {
        $settings = $_POST['settings'];
        foreach($home_settings_keys as $key=>$tag){
            if (isset($settings[$key])){
                update_option(LOL_PREFIX . $key, $settings[$key]);
            }
        }
        ?>
        <div id="setting-error-settings_updated" class="updated settings-error">
            <p><strong><?php _e('Settings saved.','responsive'); ?></strong></p></div>
    <?php
    }else{
        foreach($home_settings_keys as $key=>$tag){
            $settings[$key] = get_option(LOL_PREFIX . $key);
        }
    }
    ?>
    <div class="wrap">
        <h2>Home page settings</h2>
        <form method="post" action="">
            <?php wp_nonce_field( 'home-settings'); ?>
            <table class="form-table">
                <tbody>
                <?php foreach($home_settings_keys as $key=>$tag): ?>
                    <tr>
                        <th><?php echo $tag['title']; ?></th>
                        <td>
                            <?php if ($tag['type'] == 'text'): ?>
                                <input class="regular-text" type="text" name="settings[<?php echo $key; ?>]" value="<?php if(isset($settings[$key])) echo $settings[$key];  ?>">
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes', 'responsive'); ?>"></p>
        </form>
    </div>
<?php
}

function home_settings_get($key){
    return get_option(LOL_PREFIX . $key);
}

// QA page
if(!class_exists('QA_List_Table')){
    require_once('QA_List_Table.php');
}

function qa_management_render()
{
    if (isset($_POST['qa']) && !empty($_POST['qa']['question']) && !empty($_POST['qa']['answer']) && check_admin_referer('qa-add')){
        // add new qa
        $qa = $_POST['qa'];
        wp_insert_post(array(
            'post_type' => 'qa',
            'post_title'    => $qa['question'],
            'post_content'  => $qa['answer'],
            'post_status'   => 'publish',
        ));
        ?>
        <div id="setting-error-settings_updated" class="updated settings-error">
            <p><strong><?php _e('Q&A added.','responsive'); ?></strong></p>
        </div>
        <?php
    }
    ?>
    <div class="wrap nosubsub">
        <h2><?php _e('Questions & Answers', 'responsive'); ?></h2>
        <div id="col-container">

            <div id="col-right">
                <div class="col-wrap">
                    <?php
                    $wp_list_table = new QA_List_Table();
                    $wp_list_table->prepare_items();
                    $wp_list_table->display();
                    ?>
                </div>
            </div>
            <div id="col-left">
                <div class="col-wrap">
                    <div class="form-wrap">
                        <h3><?php _e('Add new Question/Answer', 'responsive'); ?></h3>
                        <form action="" method="post">
                            <?php wp_nonce_field( 'qa-add'); ?>
                            <div class="form-field form-required">
                                <label for="question"><?php _e('Question', 'responsive'); ?></label>
                                <input type="text" aria-required="true" size="40" value="" id="question" name="qa[question]">
                            </div>
                            <div class="form-field form-required">
                                <label for="answer"><?php _e('Answer', 'responsive'); ?></label>
                                <textarea cols="40" rows="5" id="answer" name="qa[answer]"></textarea>
                            </div>
                            <p class="submit"><input type="submit" value="<?php _e('Add new Q/A', 'responsive'); ?>" class="button button-primary" id="submit" name="submit"></p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
}

add_action('wp_ajax_qa_update', 'ajax_qa_update');
add_action('wp_ajax_nopriv_qa_update', 'ajax_qa_update');
add_action('wp_ajax_qa_delete', 'ajax_qa_delete');
add_action('wp_ajax_nopriv_qa_delete', 'ajax_qa_delete');

function ajax_qa_delete()
{
    if(!empty($_POST['id'])){
        wp_delete_post($_POST['id']);
        exit();
    }
}

function ajax_qa_update()
{
    if(!empty($_POST['id']) && isset($_POST['q']) && isset($_POST['a'])){
        wp_update_post(array(
            'ID' => $_POST['id'],
            'post_title' => $_POST['q'],
            'post_content' => $_POST['a'],
        ));

        exit();
    }
}