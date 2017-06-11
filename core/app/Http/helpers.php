<?php
/**
 * Helper functions For all application
 * @return [string] [description]
 * @author [Jacinto Joao] <[<jacintotbrc@gmail.com>]>
 */
function message(){
    $msghtml = '<div class="alert alert-'. Session::get('flash_notification.level') .'">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Message: </strong>'.Session::get('flash_notification.message').'</div>';
    return $msghtml;
} 
/*Check Bugs*/
function form_errors($errors){
    $error_list = '';
    foreach($errors->all() as $error){
        $error_list .= '- '.$error.'<br/>';
    }
    $errorsHtml = '<div class="alert alert-danger">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   '.$error_list.'</div>';
    return $errorsHtml;
}

function _email_btn($route, $id){
    $btn = '<a class="btn btn-info btn-xs" href="'.route($route, $id).'" data-toggle="ajax-modal" data-rel="tooltip" title="'.trans("application.send_email").'"><i class="fa fa-envelope"></i></a>';
    return $btn;
}
function show_btn($route, $id){
    $btn = '<a class="btn btn-info btn-xs" href="'.route($route, $id).'" data-rel="tooltip" data-placement="top" title="'.trans("application.view").'"><i class="fa fa-eye"></i></a>';
    return $btn;
}

function edit_btn($route, $id){
    $btn = '<a class="btn btn-success btn-xs" data-toggle="ajax-modal" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("application.edit").'"><i class="fa fa-pencil"></i></a>';
    return $btn;
}
function node_btn($route, $id){
    $btn = '<a class="btn btn-primary btn-xs append-tdd btn-editable" style="display:none;" data-toggle="ajax-node" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Add Child Node").'"><i class="fa fa-plus"></i></a>';
    return $btn;
}
function node1_btn($route, $id){
    $btn = '<a class="btn btn-danger btn-xs append-td btn-editable" style="display:none;"" data-toggle="ajax-node" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Add Sibling").'"><i class="fa fa-plus"></i></a>';
    return $btn;
}
function task_btn($route,$id){
    $btn = '<a class="btn btn-default btn-xs non preview" data-toggle="ajax-modal" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Content Task").'"><i class="fa fa-thumb-tack"></i></a>';
    return $btn;
}
//<i class="fa fa-file-o" aria-hidden="true"></i>

function editj_btn($route, $id){
    $btn = '<a class="btn btn-success btn-xs btn-preview-close"  data-toggle="ajax-content" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Edit Content").'"><i class="fa fa-pencil"></i></a>';
    return $btn;
}
function preview_btn($route, $id){
    $btn = '<a class="btn btn-warning btn-xs non preview preview-enable"  data-toggle="ajax-preview" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Preview").'"><i class="fa fa-eye-slash"></i></a>';
    return $btn;
}
function productpreview_btn($route, $id){
    $btn = '<a class="btn btn-warning btn-xs"  data-toggle="ajax-preview-list" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Preview").'"><i class="fa fa-eye-slash"></i></a>';
    return $btn;
}

function doc_none_btn($route, $id){
    $btn = '<a class="btn btn-default btn-xs"  data-toggle="ajax-content" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Insert").'"><i class="fa fa-file-o"></i></a>';
    return $btn;
}
function doc_null_btn($route, $id){
    $btn = '<a class="btn btn-default btn-xs"  data-toggle="ajax-modal" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Attach").'"><i class="fa fa-plus-circle"></i></a>';
    return $btn;
}
function doc_edit_btn($route, $id){
    $btn = '<a class="btn btn-default btn-xs"  data-toggle="ajax-content" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("Edit").'"><i class="fa fa-file-text-o"></i></a>';
    return $btn;
}
function pdf_btn($route, $id){
    $btn = '<a class="btn btn-default btn-xs"  data-toggle="ajax-modal" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("PDF").'"><i class="fa fa-file-pdf-o"></i></a>';
    return $btn;
}

function select_btn($route, $id){
    $btn = '<a class="btn btn-warning btn-xs" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("application.select").'"><i class="fa fa-share"></i></a>';
    return $btn;
}
function index_btn($route){
    $btn = '<a class="btn btn-warning btn-xs" data-rel="tooltip" data-placement="top" href="'.route($route).'" title="'.trans("application.select").'"><i class="fa fa-share"></i></a>';
    return $btn;
}
function _edit_btn($route, $id){
    $btn = '<a class="btn btn-success btn-xs" data-rel="tooltip" data-placement="top" href="'.route($route, $id).'" title="'.trans("application.edit").'"><i class="fa fa-pencil"></i></a>';
    return $btn;
}

function delete_btn($route, $id){
    $btn = Form::open(array("method"=>"DELETE", "route" => array($route, $id), 'class' => 'form-inline', 'style'=>'display:inline')).'
           <a class="btn btn-danger btn-xs btn-delete" data-rel="tooltip" data-placement="top" title="'.trans('application.delete').'"><i class="fa fa-trash"></i></a>'.Form::close();
    return $btn;
}
function get_company_name(){
    return 'Midigital';
}
/*
function format_amount($amount){
    $settings = App\Models\Setting::first();
    $thousand_separator = $settings ? $settings->thousand_separator : ',' ;
    $decimal_point = $settings ? $settings->decimal_separator : '.' ;
    $decimals = $settings ? $settings->decimals : 2;
    return number_format($amount,$decimals,$decimal_point,$thousand_separator);
}

function get_company_name(){
    $settings = App\Models\Setting::first();
    $company_name = $settings ? str_limit($settings->name, 20, '')  : 'Besidecod';
    return $company_name;
}
function dev(){
    $dev = 'Besidecod';
    return $dev;
}

function get_languages(){
    $languages = App\Models\Local::all();
    return $languages;
}

function get_current_language($lang){
    $language = \DB::table('locals')->where('short_name', $lang)->first();
    return $language;
*/

function form_buttons(){
    $buttons = '<button type="submit" data-rel="tooltip" data-placement="top" title="'.trans('application.save').'" class="btn btn-xs btn-success"><i class="fa fa-save"></i> '.trans("application.save").'</button>
                <button type="button" data-rel="tooltip" data-placement="top" title="'.trans('application.close').'" data-dismiss="modal" class="btn btn-xs btn-danger"> <i class="fa fa-times"></i> '.trans("application.close").'</button>';
    return $buttons;
}
function form_close(){
    $buttons = '<button type="button" data-rel="tooltip" data-placement="top" title="'.trans('application.edit').'" class="btn btn-xs btn-success" id="ck-edit"><i class="fa fa-pencil"></i> '.trans("application.edit").'</button>
    <button type="button" data-rel="tooltip" data-placement="top" title="'.trans('application.close').'" data-dismiss="close" class="btn btn-xs btn-danger btn-close"> <i class="fa fa-times"></i> '.trans("application.close").'</button>';
    return $buttons;
}
function preview_close(){
    $buttons = '<button type="button" data-rel="tooltip" data-placement="top" title="'.trans('application.close').'" data-dismiss="close" class="btn btn-xs btn-danger btn-preview-close"> <i class="fa fa-times"></i> '.trans("application.close").'</button>';
    return $buttons;
}
function statuses(){
    return array(
        '0' => array(
            'status' => 'unpaid',
            'label' => trans('application.unpaid'),
            'class' => 'label-warning'
        ),
        '1' => array(
            'status' => 'partially_paid',
            'label' => trans('application.partially_paid'),
            'class' => 'label-primary'
        ),
        '2' => array(
            'status' => 'paid',
            'label' => trans('application.paid'),
            'class' => 'label-success'
        ),
        '3' => array(
            'status' => 'overdue',
            'label' => trans('application.overdue'),
            'class' => 'label-danger'
        )
    );
}

function getStatus($field, $value)
{
    $statuses = statuses();
   foreach($statuses as $key => $status){
       if ( $status[$field] === $value )
           return $key;
   }
   return false;
}
function hasPermission($permission, $show_msg = false){
    if(\Auth::user()->can($permission) || \Auth::user()->HasRole('admin')){
        return true;
    }else{
        if($show_msg)\Flash::error(trans('application.dont_have_permission'));
        return false;
    }
}
function parse_template($object, $body)
{
    if (preg_match_all('/\{(.*?)\}/', $body, $template_vars)){
        $replace ='';
        foreach ($template_vars[1] as $var)
        {
            switch (trim($var))
            {
                case 'invoice_number':
                    if(isset($object->invoice->number)){
                        $replace = $object->invoice->number;
                    }
                    break;
                case 'invoice_amount':

                    if(isset($object->invoice->totals['grandTotal'])){
                        $replace = $object->invoice->currency.$object->invoice->totals['grandTotal'];
                    }
                    break;
                case 'client_name':
                    if(isset($object->client->name)){
                        $replace = $object->client->name;
                    }
                    break;
                case 'client_email':
                    if(isset($object->client->email)){
                        $replace = $object->client->email;
                    }
                    break;
                case 'client_number':
                    if(isset($object->client->lient_no)){
                        $replace = $object->client->lient_no;
                    }
                    break;
                case 'company_name':
                    if(isset($object->settings->name)){
                        $replace = $object->settings->name;
                    }
                    break;
                case 'company_email':
                    if(isset($object->settings->email)){
                        $replace = $object->settings->email;
                    }
                    break;
                case 'company_website':
                    if(isset($object->settings->website)){
                        $replace = $object->settings->website;
                    }
                    break;
                case 'contact_person':
                    if(isset($object->settings->contact)){
                        $replace = $object->settings->contact;
                    }
                    break;
                case 'username':
                    if(isset($object->user->username)){
                        $replace = $object->user->username;
                    }
                    break;
                case 'password':
                    if(isset($object->user->password)){
                        $replace = $object->user->password;
                    }
                    break;
                case 'login_link':
                    if(isset($object->user->login_link)){
                        $replace = $object->user->login_link;
                    }
                    break;
                default:
                    $replace = '';
            }
            $body = str_replace('{' . $var . '}', $replace, $body);
        }
    }
    return $body;
}
function array_multi_subsort($array, $subkey)
{
    $b = array(); $c = array();
    foreach ($array as $k => $v) {
        $b[$k] = strtolower($v[$subkey]);
    }
    asort($b);
    foreach ($b as $key => $val) {
        $c[] = $array[$key];
    }
    return $c;
}
