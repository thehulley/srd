<?php
class app_form_sec_groups_apps_form extends app_form_sec_groups_apps_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

header("X-XSS-Protection: 1; mode=block");
header("X-Frame-Options: SAMEORIGIN");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT" />
 <META http-equiv="Last-Modified" content="<?php echo gmdate('D, d M Y H:i:s') ?> GMT" />
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate" />
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0" />
 <META http-equiv="Pragma" content="no-cache" />
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
  var sc_css_status_pwd_box = '<?php echo $this->Ini->Css_status_pwd_box; ?>';
  var sc_css_status_pwd_text = '<?php echo $this->Ini->Css_status_pwd_text; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
        <SCRIPT type="text/javascript" src="../_lib/lib/js/jquery-3.6.0.min.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->url_lib_js ?>frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>app_form_sec_groups_apps/app_form_sec_groups_apps_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("app_form_sec_groups_apps_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_t")) document.getElementById("sc_b_navpage_t").innerHTML = str_navpage;
}

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "exportacao_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "exportacao_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "impressao_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "impressao_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "insercao_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "insercao_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "remocao_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "remocao_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "atualizacao_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "atualizacao_" + ii + "[]";
            $('input[name="' + cmp_name + '"]').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name="' + cmp_name + '"]').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name="' + cmp_name + '"]').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("insercao_=enabled", "", i);
    nm_field_disabled("remocao_=enabled", "", i);
    nm_field_disabled("atualizacao_=enabled", "", i);
    nm_field_disabled("exportacao_=enabled", "", i);
    nm_field_disabled("impressao_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('app_form_sec_groups_apps_jquery.php');

?>

 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
     if ($('#t').length>0) {
         scQuickSearchKeyUp('t', null);
     }
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchKeyUp(sPos, e) {
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
       else
       {
           $('#SC_fast_search_submit_'+sPos).show();
       }
     }
   }
   function nm_gp_submit_qsearch(pos)
   {
        nm_move('fast_search', pos);
   }
   function nm_gp_open_qsearch_div(pos)
   {
        if($('#SC_fast_search_dropdown_' + pos).hasClass('fa-caret-down'))
        {
            if(($('#quicksearchph_' + pos).offset().top+$('#id_qs_div_' + pos).height()+10) >= $(document).height())
            {
                $('#id_qs_div_' + pos).offset({top:($('#quicksearchph_' + pos).offset().top-($('#quicksearchph_' + pos).height()/2)-$('#id_qs_div_' + pos).height()-4)});
            }

            nm_gp_open_qsearch_div_store_temp(pos);
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-down').addClass('fa-caret-up');
        }
        else
        {
            $('#SC_fast_search_dropdown_' + pos).removeClass('fa-caret-up').addClass('fa-caret-down');
        }
        $('#id_qs_div_' + pos).toggle();
   }

   var tmp_qs_arr_fields = [], tmp_qs_arr_cond = "";
   function nm_gp_open_qsearch_div_store_temp(pos)
   {
        tmp_qs_arr_fields = [], tmp_qs_str_cond = "";

        if($('#fast_search_f0_' + pos).prop('type') == 'select-multiple')
        {
            tmp_qs_arr_fields = $('#fast_search_f0_' + pos).val();
        }
        else
        {
            tmp_qs_arr_fields.push($('#fast_search_f0_' + pos).val());
        }

        tmp_qs_str_cond = $('#cond_fast_search_f0_' + pos).val();
   }

   function nm_gp_cancel_qsearch_div_store_temp(pos)
   {
        $('#fast_search_f0_' + pos).val('');
        $("#fast_search_f0_" + pos + " option").prop('selected', false);
        for(it=0; it<tmp_qs_arr_fields.length; it++)
        {
            $("#fast_search_f0_" + pos + " option[value='"+ tmp_qs_arr_fields[it] +"']").prop('selected', true);
        }
        $("#fast_search_f0_" + pos).change();
        tmp_qs_arr_fields = [];

        $('#cond_fast_search_f0_' + pos).val(tmp_qs_str_cond);
        $('#cond_fast_search_f0_' + pos).change();
        tmp_qs_str_cond = "";

        nm_gp_open_qsearch_div(pos);
   } if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = 'margin-left: 0px; margin-right: 0px; margin-top: 1px; margin-bottom: 0px;';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
    $remove_border = isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['remove_border']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['remove_border'] ? 'border-width: 0; ' : '';
    $vertical_center = '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body . $vertical_center; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("app_form_sec_groups_apps_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php if (!isset($sc_check_excl)) {$sc_check_excl = array();} echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<?php
$_SESSION['scriptcase']['error_span_title']['app_form_sec_groups_apps'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['app_form_sec_groups_apps'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?>ERROR</td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php if (isset($this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'])) {echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl'];} ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder" style="<?php echo (isset($remove_border) ? $remove_border : ''); ?>">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<TABLE width="100%" style="padding: 0px; border-spacing: 0px; border-width: 0px;" cellpadding="0" cellspacing="0">
<TR align="center">
 <TD colspan="3">
     <table  style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%" cellpadding="0" cellspacing="0">
       <tr valign="middle">
         <td align="left" ><span class="scFormHeaderFont"> <?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - " . $this->Ini->Nm_lang['lang_list_apps_x_groups'] . ""; } ?> </span></td>
         <td style="font-size: 5px">&nbsp; &nbsp; </td>
         <td align="center" ><span class="scFormHeaderFont"> <?php echo "" . $this->Ini->Nm_lang['lang_sec_group'] . ": " . $_SESSION['group_desc'] . "" ?> </span></td>
         <td style="font-size: 5px">&nbsp; &nbsp; </td>
         <td align="right" ><span class="scFormHeaderFont"> <?php echo date($this->dateDefaultFormat()); ?> &nbsp;&nbsp;</span></td>
         <td width="3px" class="scFormHeader"></td>
       </tr>
     </table>
 </TD>
</TR>
<TR align="center" >
  <TD height="5px" class="scFormHeader"></TD>
  <TD height="1px" class="scFormHeader"></TD>
  <TD height="1px" class="scFormHeader"></TD>
</TR>
</TABLE></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R")
{
    $NM_btn = false;
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_t" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['fast_search'][2] : "";
          $stateSearchIconClose  = 'none';
          $stateSearchIconSearch = '';
          if(!empty($OPC_dat))
          {
              $stateSearchIconClose  = '';
              $stateSearchIconSearch = 'none';
          }
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <select id='fast_search_f0_t'   class="scFormToolbarInput" style="vertical-align: middle;" name="nmgp_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $SC_Label_atu['SC_all_Cmp'] = $this->Ini->Nm_lang['lang_srch_all_fields']; 
          foreach ($SC_Label_atu as $CMP => $LABEL)
          {
              $OPC_sel = ($CMP == $OPC_cmp) ? " selected" : "";
              echo "           <option value='" . $CMP . "'" . $OPC_sel . ">" . $LABEL . "</option>";
          }
?> 
          </select>
          <select id='cond_fast_search_f0_t' class="scFormToolbarInput" style="vertical-align: middle;display:;" name="nmgp_cond_fast_search_t" onChange="change_fast_t = 'CH';">
<?php 
          $OPC_sel = ("qp" == $OPC_arg) ? " selected" : "";
           echo "           <option value='qp'" . $OPC_sel . ">" . $this->Ini->Nm_lang['lang_srch_like'] . "</option>";
?> 
          </select>
          <span id="quicksearchph_t" class="scFormToolbarInput" style='display: inline-block; vertical-align: inherit'>
              <span>
                  <input type="text" id="SC_fast_search_t" class="scFormToolbarInputText" style="border-width: 0px;;" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">&nbsp;
                  <img style="display: <?php echo $stateSearchIconSearch ?>; "  id="SC_fast_search_submit_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
                  <img style="display: <?php echo $stateSearchIconClose ?>; " id="SC_fast_search_close_t" class='css_toolbar_obj_qs_search_img' src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
              </span>
          </span>  </div>
  <?php
      }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable<?php echo $this->classes_100perc_fields['table'] ?>" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   
    <TD class="scFormLabelOddMult"  width="10"> <?php echo $this->Ini->Nm_lang['lang_othr_slct_item'] ?><br /><input type="checkbox" class="sc-ui-checkbox-all-all" name="" /> </TD>
   
   <?php if (isset($this->nmgp_cmp_hidden['aplicacao_']) && $this->nmgp_cmp_hidden['aplicacao_'] == 'off') { $sStyleHidden_aplicacao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aplicacao_']) || $this->nmgp_cmp_hidden['aplicacao_'] == 'on') {
      if (!isset($this->nm_new_label['aplicacao_'])) {
          $this->nm_new_label['aplicacao_'] = "" . $this->Ini->Nm_lang['lang_sec_app_name'] . ""; } ?>

    <TD class="scFormLabelOddMult css_aplicacao__label" id="hidden_field_label_aplicacao_" style="<?php echo $sStyleHidden_aplicacao_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['aplicacao_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] == "aplicacao")
      {
          $orderColName = "aplicacao";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $prep_link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-aplicacao\" />";
      $link_a = "<a href=\"javascript:nm_move('ordem', 'aplicacao')\" class=\"scFormLabelLink scFormLabelLinkOddMult\"";
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      echo $link_a . $Css_compl_sort . ">" . $link_img . "</a>";
?>
 <span class="scFormRequiredOddMult">*</span> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['acesso_']) && $this->nmgp_cmp_hidden['acesso_'] == 'off') { $sStyleHidden_acesso_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['acesso_']) || $this->nmgp_cmp_hidden['acesso_'] == 'on') {
      if (!isset($this->nm_new_label['acesso_'])) {
          $this->nm_new_label['acesso_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_access'] . ""; } ?>

    <TD class="scFormLabelOddMult css_acesso__label" id="hidden_field_label_acesso_" style="<?php echo $sStyleHidden_acesso_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['acesso_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] == "acesso")
      {
          $orderColName = "acesso";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $prep_link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-acesso\" />";
      $link_a = "<a href=\"javascript:nm_move('ordem', 'acesso')\" class=\"scFormLabelLink scFormLabelLinkOddMult\"";
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      echo $link_a . $Css_compl_sort . ">" . $link_img . "</a>";
?>
<br /><input type="checkbox" class="sc-ui-checkbox-acesso_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['insercao_']) && $this->nmgp_cmp_hidden['insercao_'] == 'off') { $sStyleHidden_insercao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['insercao_']) || $this->nmgp_cmp_hidden['insercao_'] == 'on') {
      if (!isset($this->nm_new_label['insercao_'])) {
          $this->nm_new_label['insercao_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_insert'] . ""; } ?>

    <TD class="scFormLabelOddMult css_insercao__label" id="hidden_field_label_insercao_" style="<?php echo $sStyleHidden_insercao_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['insercao_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] == "insercao")
      {
          $orderColName = "insercao";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $prep_link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-insercao\" />";
      $link_a = "<a href=\"javascript:nm_move('ordem', 'insercao')\" class=\"scFormLabelLink scFormLabelLinkOddMult\"";
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      echo $link_a . $Css_compl_sort . ">" . $link_img . "</a>";
?>
<br /><input type="checkbox" class="sc-ui-checkbox-insercao_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['remocao_']) && $this->nmgp_cmp_hidden['remocao_'] == 'off') { $sStyleHidden_remocao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['remocao_']) || $this->nmgp_cmp_hidden['remocao_'] == 'on') {
      if (!isset($this->nm_new_label['remocao_'])) {
          $this->nm_new_label['remocao_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_delete'] . ""; } ?>

    <TD class="scFormLabelOddMult css_remocao__label" id="hidden_field_label_remocao_" style="<?php echo $sStyleHidden_remocao_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['remocao_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] == "remocao")
      {
          $orderColName = "remocao";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $prep_link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-remocao\" />";
      $link_a = "<a href=\"javascript:nm_move('ordem', 'remocao')\" class=\"scFormLabelLink scFormLabelLinkOddMult\"";
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      echo $link_a . $Css_compl_sort . ">" . $link_img . "</a>";
?>
<br /><input type="checkbox" class="sc-ui-checkbox-remocao_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['atualizacao_']) && $this->nmgp_cmp_hidden['atualizacao_'] == 'off') { $sStyleHidden_atualizacao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['atualizacao_']) || $this->nmgp_cmp_hidden['atualizacao_'] == 'on') {
      if (!isset($this->nm_new_label['atualizacao_'])) {
          $this->nm_new_label['atualizacao_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_update'] . ""; } ?>

    <TD class="scFormLabelOddMult css_atualizacao__label" id="hidden_field_label_atualizacao_" style="<?php echo $sStyleHidden_atualizacao_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['atualizacao_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] == "atualizacao")
      {
          $orderColName = "atualizacao";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $prep_link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-atualizacao\" />";
      $link_a = "<a href=\"javascript:nm_move('ordem', 'atualizacao')\" class=\"scFormLabelLink scFormLabelLinkOddMult\"";
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      echo $link_a . $Css_compl_sort . ">" . $link_img . "</a>";
?>
<br /><input type="checkbox" class="sc-ui-checkbox-atualizacao_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['exportacao_']) && $this->nmgp_cmp_hidden['exportacao_'] == 'off') { $sStyleHidden_exportacao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['exportacao_']) || $this->nmgp_cmp_hidden['exportacao_'] == 'on') {
      if (!isset($this->nm_new_label['exportacao_'])) {
          $this->nm_new_label['exportacao_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_export'] . ""; } ?>

    <TD class="scFormLabelOddMult css_exportacao__label" id="hidden_field_label_exportacao_" style="<?php echo $sStyleHidden_exportacao_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['exportacao_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] == "exportacao")
      {
          $orderColName = "exportacao";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $prep_link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-exportacao\" />";
      $link_a = "<a href=\"javascript:nm_move('ordem', 'exportacao')\" class=\"scFormLabelLink scFormLabelLinkOddMult\"";
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      echo $link_a . $Css_compl_sort . ">" . $link_img . "</a>";
?>
<br /><input type="checkbox" class="sc-ui-checkbox-exportacao_-control" /> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['impressao_']) && $this->nmgp_cmp_hidden['impressao_'] == 'off') { $sStyleHidden_impressao_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['impressao_']) || $this->nmgp_cmp_hidden['impressao_'] == 'on') {
      if (!isset($this->nm_new_label['impressao_'])) {
          $this->nm_new_label['impressao_'] = "" . $this->Ini->Nm_lang['lang_sec_priv_print'] . ""; } ?>

    <TD class="scFormLabelOddMult css_impressao__label" id="hidden_field_label_impressao_" style="<?php echo $sStyleHidden_impressao_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['impressao_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_cmp'] == "impressao")
      {
          $orderColName = "impressao";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $prep_link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-impressao\" />";
      $link_a = "<a href=\"javascript:nm_move('ordem', 'impressao')\" class=\"scFormLabelLink scFormLabelLinkOddMult\"";
      $Css_compl_sort = " style=\"display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center;justify-content:inherit;\"";
      if (empty($nome_img))
      {
          $link_img = nl2br($SC_Label);
          $Css_compl_sort = "";
      }
      elseif ($this->Ini->Label_sort_pos == "right_field")
      {
          $link_img = "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_field")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      elseif ($this->Ini->Label_sort_pos == "right_cell")
      {
          $link_img = "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>" . $prep_link_img;
      }
      elseif ($this->Ini->Label_sort_pos == "left_cell")
      {
          $link_img = $prep_link_img . "<span style='display: inline-block; flex-grow: 1; white-space: normal; word-break: normal;'>" . nl2br($SC_Label) . "</span>";
      }
      echo $link_a . $Css_compl_sort . ">" . $link_img . "</a>";
?>
<br /><input type="checkbox" class="sc-ui-checkbox-impressao_-control" /> </TD>
   <?php } ?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   $sc_hidden_no = 1; $sc_hidden_yes = 0;
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_app_form_sec_groups_apps);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_app_form_sec_groups_apps = $this->form_vert_app_form_sec_groups_apps;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_app_form_sec_groups_apps))
   {
       $sc_seq_vert = 0;
   }
   foreach ($this->form_vert_app_form_sec_groups_apps as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->grupo_id_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['grupo_id_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['aplicacao_'] = true;
           $this->nmgp_cmp_readonly['acesso_'] = true;
           $this->nmgp_cmp_readonly['insercao_'] = true;
           $this->nmgp_cmp_readonly['remocao_'] = true;
           $this->nmgp_cmp_readonly['atualizacao_'] = true;
           $this->nmgp_cmp_readonly['exportacao_'] = true;
           $this->nmgp_cmp_readonly['impressao_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['aplicacao_']) || $this->nmgp_cmp_readonly['aplicacao_'] != "on") {$this->nmgp_cmp_readonly['aplicacao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['acesso_']) || $this->nmgp_cmp_readonly['acesso_'] != "on") {$this->nmgp_cmp_readonly['acesso_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['insercao_']) || $this->nmgp_cmp_readonly['insercao_'] != "on") {$this->nmgp_cmp_readonly['insercao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['remocao_']) || $this->nmgp_cmp_readonly['remocao_'] != "on") {$this->nmgp_cmp_readonly['remocao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['atualizacao_']) || $this->nmgp_cmp_readonly['atualizacao_'] != "on") {$this->nmgp_cmp_readonly['atualizacao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['exportacao_']) || $this->nmgp_cmp_readonly['exportacao_'] != "on") {$this->nmgp_cmp_readonly['exportacao_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['impressao_']) || $this->nmgp_cmp_readonly['impressao_'] != "on") {$this->nmgp_cmp_readonly['impressao_'] = false;}
       }
            if (isset($this->form_vert_form_preenchimento[$sc_seq_vert])) {
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
            }
        $this->aplicacao_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['aplicacao_']; 
       if (empty($this->aplicacao_))
       {
           $this->aplicacao_ = "";
       }
       $aplicacao_ = $this->aplicacao_; 
       $sStyleHidden_aplicacao_ = '';
       if (isset($sCheckRead_aplicacao_))
       {
           unset($sCheckRead_aplicacao_);
       }
       if (isset($this->nmgp_cmp_readonly['aplicacao_']))
       {
           $sCheckRead_aplicacao_ = $this->nmgp_cmp_readonly['aplicacao_'];
       }
       if (isset($this->nmgp_cmp_hidden['aplicacao_']) && $this->nmgp_cmp_hidden['aplicacao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aplicacao_']);
           $sStyleHidden_aplicacao_ = 'display: none;';
       }
       $bTestReadOnly_aplicacao_ = true;
       $sStyleReadLab_aplicacao_ = 'display: none;';
       $sStyleReadInp_aplicacao_ = '';
       if (isset($this->nmgp_cmp_readonly['aplicacao_']) && $this->nmgp_cmp_readonly['aplicacao_'] == 'on')
       {
           $bTestReadOnly_aplicacao_ = false;
           unset($this->nmgp_cmp_readonly['aplicacao_']);
           $sStyleReadLab_aplicacao_ = '';
           $sStyleReadInp_aplicacao_ = 'display: none;';
       }
       $this->acesso_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['acesso_']; 
       $acesso_ = $this->acesso_; 
       $sStyleHidden_acesso_ = '';
       if (isset($sCheckRead_acesso_))
       {
           unset($sCheckRead_acesso_);
       }
       if (isset($this->nmgp_cmp_readonly['acesso_']))
       {
           $sCheckRead_acesso_ = $this->nmgp_cmp_readonly['acesso_'];
       }
       if (isset($this->nmgp_cmp_hidden['acesso_']) && $this->nmgp_cmp_hidden['acesso_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['acesso_']);
           $sStyleHidden_acesso_ = 'display: none;';
       }
       $bTestReadOnly_acesso_ = true;
       $sStyleReadLab_acesso_ = 'display: none;';
       $sStyleReadInp_acesso_ = '';
       if (isset($this->nmgp_cmp_readonly['acesso_']) && $this->nmgp_cmp_readonly['acesso_'] == 'on')
       {
           $bTestReadOnly_acesso_ = false;
           unset($this->nmgp_cmp_readonly['acesso_']);
           $sStyleReadLab_acesso_ = '';
           $sStyleReadInp_acesso_ = 'display: none;';
       }
       $this->insercao_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['insercao_']; 
       $insercao_ = $this->insercao_; 
       $sStyleHidden_insercao_ = '';
       if (isset($sCheckRead_insercao_))
       {
           unset($sCheckRead_insercao_);
       }
       if (isset($this->nmgp_cmp_readonly['insercao_']))
       {
           $sCheckRead_insercao_ = $this->nmgp_cmp_readonly['insercao_'];
       }
       if (isset($this->nmgp_cmp_hidden['insercao_']) && $this->nmgp_cmp_hidden['insercao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['insercao_']);
           $sStyleHidden_insercao_ = 'display: none;';
       }
       $bTestReadOnly_insercao_ = true;
       $sStyleReadLab_insercao_ = 'display: none;';
       $sStyleReadInp_insercao_ = '';
       if (isset($this->nmgp_cmp_readonly['insercao_']) && $this->nmgp_cmp_readonly['insercao_'] == 'on')
       {
           $bTestReadOnly_insercao_ = false;
           unset($this->nmgp_cmp_readonly['insercao_']);
           $sStyleReadLab_insercao_ = '';
           $sStyleReadInp_insercao_ = 'display: none;';
       }
       $this->remocao_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['remocao_']; 
       $remocao_ = $this->remocao_; 
       $sStyleHidden_remocao_ = '';
       if (isset($sCheckRead_remocao_))
       {
           unset($sCheckRead_remocao_);
       }
       if (isset($this->nmgp_cmp_readonly['remocao_']))
       {
           $sCheckRead_remocao_ = $this->nmgp_cmp_readonly['remocao_'];
       }
       if (isset($this->nmgp_cmp_hidden['remocao_']) && $this->nmgp_cmp_hidden['remocao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['remocao_']);
           $sStyleHidden_remocao_ = 'display: none;';
       }
       $bTestReadOnly_remocao_ = true;
       $sStyleReadLab_remocao_ = 'display: none;';
       $sStyleReadInp_remocao_ = '';
       if (isset($this->nmgp_cmp_readonly['remocao_']) && $this->nmgp_cmp_readonly['remocao_'] == 'on')
       {
           $bTestReadOnly_remocao_ = false;
           unset($this->nmgp_cmp_readonly['remocao_']);
           $sStyleReadLab_remocao_ = '';
           $sStyleReadInp_remocao_ = 'display: none;';
       }
       $this->atualizacao_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['atualizacao_']; 
       $atualizacao_ = $this->atualizacao_; 
       $sStyleHidden_atualizacao_ = '';
       if (isset($sCheckRead_atualizacao_))
       {
           unset($sCheckRead_atualizacao_);
       }
       if (isset($this->nmgp_cmp_readonly['atualizacao_']))
       {
           $sCheckRead_atualizacao_ = $this->nmgp_cmp_readonly['atualizacao_'];
       }
       if (isset($this->nmgp_cmp_hidden['atualizacao_']) && $this->nmgp_cmp_hidden['atualizacao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['atualizacao_']);
           $sStyleHidden_atualizacao_ = 'display: none;';
       }
       $bTestReadOnly_atualizacao_ = true;
       $sStyleReadLab_atualizacao_ = 'display: none;';
       $sStyleReadInp_atualizacao_ = '';
       if (isset($this->nmgp_cmp_readonly['atualizacao_']) && $this->nmgp_cmp_readonly['atualizacao_'] == 'on')
       {
           $bTestReadOnly_atualizacao_ = false;
           unset($this->nmgp_cmp_readonly['atualizacao_']);
           $sStyleReadLab_atualizacao_ = '';
           $sStyleReadInp_atualizacao_ = 'display: none;';
       }
       $this->exportacao_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['exportacao_']; 
       $exportacao_ = $this->exportacao_; 
       $sStyleHidden_exportacao_ = '';
       if (isset($sCheckRead_exportacao_))
       {
           unset($sCheckRead_exportacao_);
       }
       if (isset($this->nmgp_cmp_readonly['exportacao_']))
       {
           $sCheckRead_exportacao_ = $this->nmgp_cmp_readonly['exportacao_'];
       }
       if (isset($this->nmgp_cmp_hidden['exportacao_']) && $this->nmgp_cmp_hidden['exportacao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['exportacao_']);
           $sStyleHidden_exportacao_ = 'display: none;';
       }
       $bTestReadOnly_exportacao_ = true;
       $sStyleReadLab_exportacao_ = 'display: none;';
       $sStyleReadInp_exportacao_ = '';
       if (isset($this->nmgp_cmp_readonly['exportacao_']) && $this->nmgp_cmp_readonly['exportacao_'] == 'on')
       {
           $bTestReadOnly_exportacao_ = false;
           unset($this->nmgp_cmp_readonly['exportacao_']);
           $sStyleReadLab_exportacao_ = '';
           $sStyleReadInp_exportacao_ = 'display: none;';
       }
       $this->impressao_ = $this->form_vert_app_form_sec_groups_apps[$sc_seq_vert]['impressao_']; 
       $impressao_ = $this->impressao_; 
       $sStyleHidden_impressao_ = '';
       if (isset($sCheckRead_impressao_))
       {
           unset($sCheckRead_impressao_);
       }
       if (isset($this->nmgp_cmp_readonly['impressao_']))
       {
           $sCheckRead_impressao_ = $this->nmgp_cmp_readonly['impressao_'];
       }
       if (isset($this->nmgp_cmp_hidden['impressao_']) && $this->nmgp_cmp_hidden['impressao_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['impressao_']);
           $sStyleHidden_impressao_ = 'display: none;';
       }
       $bTestReadOnly_impressao_ = true;
       $sStyleReadLab_impressao_ = 'display: none;';
       $sStyleReadInp_impressao_ = '';
       if (isset($this->nmgp_cmp_readonly['impressao_']) && $this->nmgp_cmp_readonly['impressao_'] == 'on')
       {
           $bTestReadOnly_impressao_ = false;
           unset($this->nmgp_cmp_readonly['impressao_']);
           $sStyleReadLab_impressao_ = '';
           $sStyleReadInp_impressao_ = 'display: none;';
       }

       $nm_cor_fun_vert = (isset($nm_cor_fun_vert) && $nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = (isset($nm_img_fun_cel)  && $nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   
    <TD class="scFormDataOddMult" > 
<input type="checkbox" class="sc-ui-checkbox-record-all" name="sc_check_all[<?php echo $sc_seq_vert ?>]" alt="<?php echo $sc_seq_vert ?>" /> </TD>
   
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_app_form_sec_groups_apps_add_new_line(" . $sc_seq_vert . ")", "do_ajax_app_form_sec_groups_apps_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_app_form_sec_groups_apps_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_app_form_sec_groups_apps_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_app_form_sec_groups_apps_cancel_update(" . $sc_seq_vert . ")", "do_ajax_app_form_sec_groups_apps_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['aplicacao_']) && $this->nmgp_cmp_hidden['aplicacao_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aplicacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aplicacao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aplicacao__line" id="hidden_field_data_aplicacao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aplicacao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aplicacao__line" style="vertical-align: top;padding: 0px"><span id="id_ajax_label_aplicacao_<?php echo $sc_seq_vert; ?>"><?php echo $aplicacao_?></span>
<input type="hidden" name="aplicacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aplicacao_); ?>">
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aplicacao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aplicacao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['acesso_']) && $this->nmgp_cmp_hidden['acesso_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="acesso_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->acesso_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->acesso__1 = explode(";", trim($this->acesso_));
  } 
  else
  {
      if (empty($this->acesso_))
      {
          $this->acesso__1= array(); 
          $this->acesso_= "";
      } 
      else
      {
          $this->acesso__1= $this->acesso_; 
          $this->acesso_= ""; 
          foreach ($this->acesso__1 as $cada_acesso_)
          {
             if (!empty($acesso_))
             {
                 $this->acesso_.= ";"; 
             } 
             $this->acesso_.= $cada_acesso_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_acesso__line" id="hidden_field_data_acesso_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_acesso_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_acesso__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_acesso_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["acesso_"]) &&  $this->nmgp_cmp_readonly["acesso_"] == "on") { 

$acesso__look = "";
 if ($this->acesso_ == "Y") { $acesso__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($acesso__look)) { $acesso__look = $this->acesso_; }
?>
<input type="hidden" name="acesso_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($acesso_) . "\">" . $acesso__look . ""; ?>
<?php } else { ?>

<?php

$acesso__look = "";
 if ($this->acesso_ == "Y") { $acesso__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($acesso__look)) { $acesso__look = $this->acesso_; }
?>
<span id="id_read_on_acesso_<?php echo $sc_seq_vert ; ?>" class="css_acesso__line" style="<?php echo $sStyleReadLab_acesso_; ?>"><?php echo $this->form_format_readonly("acesso_", $this->form_encode_input($acesso__look)); ?></span><span id="id_read_off_acesso_<?php echo $sc_seq_vert ; ?>" class="css_read_off_acesso_ css_acesso__line" style="<?php echo $sStyleReadInp_acesso_; ?>"><?php echo "<div id=\"idAjaxCheckbox_acesso_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_acesso__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_acesso__line"><?php $tempOptionId = "id-opt-acesso_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-acesso_ sc-ui-checkbox-acesso_<?php echo $sc_seq_vert ?>" name="acesso_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_acesso_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->acesso__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_acesso_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_acesso_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['insercao_']) && $this->nmgp_cmp_hidden['insercao_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="insercao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->insercao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->insercao__1 = explode(";", trim($this->insercao_));
  } 
  else
  {
      if (empty($this->insercao_))
      {
          $this->insercao__1= array(); 
      } 
      else
      {
          $this->insercao__1= $this->insercao_; 
          $this->insercao_= ""; 
          foreach ($this->insercao__1 as $cada_insercao_)
          {
             if (!empty($insercao_))
             {
                 $this->insercao_.= ";"; 
             } 
             $this->insercao_.= $cada_insercao_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_insercao__line" id="hidden_field_data_insercao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_insercao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_insercao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_insercao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["insercao_"]) &&  $this->nmgp_cmp_readonly["insercao_"] == "on") { 

$insercao__look = "";
 if (in_array("Y", $this->insercao__1))  { $insercao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<input type="hidden" name="insercao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($insercao_) . "\">" . $insercao__look . ""; ?>
<?php } else { ?>

<?php

$insercao__look = "";
 if (in_array("Y", $this->insercao__1))  { $insercao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<span id="id_read_on_insercao_<?php echo $sc_seq_vert ; ?>" class="css_insercao__line" style="<?php echo $sStyleReadLab_insercao_; ?>"><?php echo $this->form_format_readonly("insercao_", $this->form_encode_input($insercao__look)); ?></span><span id="id_read_off_insercao_<?php echo $sc_seq_vert ; ?>" class="css_read_off_insercao_ css_insercao__line" style="<?php echo $sStyleReadInp_insercao_; ?>"><?php echo "<div id=\"idAjaxCheckbox_insercao_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_insercao__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_insercao__line"><?php $tempOptionId = "id-opt-insercao_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-insercao_ sc-ui-checkbox-insercao_<?php echo $sc_seq_vert ?>" name="insercao_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_insercao_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->insercao__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_insercao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_insercao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['remocao_']) && $this->nmgp_cmp_hidden['remocao_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="remocao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->remocao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->remocao__1 = explode(";", trim($this->remocao_));
  } 
  else
  {
      if (empty($this->remocao_))
      {
          $this->remocao__1= array(); 
          $this->remocao_= "";
      } 
      else
      {
          $this->remocao__1= $this->remocao_; 
          $this->remocao_= ""; 
          foreach ($this->remocao__1 as $cada_remocao_)
          {
             if (!empty($remocao_))
             {
                 $this->remocao_.= ";"; 
             } 
             $this->remocao_.= $cada_remocao_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_remocao__line" id="hidden_field_data_remocao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_remocao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_remocao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_remocao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["remocao_"]) &&  $this->nmgp_cmp_readonly["remocao_"] == "on") { 

$remocao__look = "";
 if ($this->remocao_ == "Y") { $remocao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($remocao__look)) { $remocao__look = $this->remocao_; }
?>
<input type="hidden" name="remocao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($remocao_) . "\">" . $remocao__look . ""; ?>
<?php } else { ?>

<?php

$remocao__look = "";
 if ($this->remocao_ == "Y") { $remocao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($remocao__look)) { $remocao__look = $this->remocao_; }
?>
<span id="id_read_on_remocao_<?php echo $sc_seq_vert ; ?>" class="css_remocao__line" style="<?php echo $sStyleReadLab_remocao_; ?>"><?php echo $this->form_format_readonly("remocao_", $this->form_encode_input($remocao__look)); ?></span><span id="id_read_off_remocao_<?php echo $sc_seq_vert ; ?>" class="css_read_off_remocao_ css_remocao__line" style="<?php echo $sStyleReadInp_remocao_; ?>"><?php echo "<div id=\"idAjaxCheckbox_remocao_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_remocao__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_remocao__line"><?php $tempOptionId = "id-opt-remocao_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-remocao_ sc-ui-checkbox-remocao_<?php echo $sc_seq_vert ?>" name="remocao_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_remocao_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->remocao__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_remocao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_remocao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['atualizacao_']) && $this->nmgp_cmp_hidden['atualizacao_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="atualizacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->atualizacao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->atualizacao__1 = explode(";", trim($this->atualizacao_));
  } 
  else
  {
      if (empty($this->atualizacao_))
      {
          $this->atualizacao__1= array(); 
          $this->atualizacao_= "";
      } 
      else
      {
          $this->atualizacao__1= $this->atualizacao_; 
          $this->atualizacao_= ""; 
          foreach ($this->atualizacao__1 as $cada_atualizacao_)
          {
             if (!empty($atualizacao_))
             {
                 $this->atualizacao_.= ";"; 
             } 
             $this->atualizacao_.= $cada_atualizacao_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_atualizacao__line" id="hidden_field_data_atualizacao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_atualizacao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_atualizacao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_atualizacao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["atualizacao_"]) &&  $this->nmgp_cmp_readonly["atualizacao_"] == "on") { 

$atualizacao__look = "";
 if ($this->atualizacao_ == "Y") { $atualizacao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($atualizacao__look)) { $atualizacao__look = $this->atualizacao_; }
?>
<input type="hidden" name="atualizacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($atualizacao_) . "\">" . $atualizacao__look . ""; ?>
<?php } else { ?>

<?php

$atualizacao__look = "";
 if ($this->atualizacao_ == "Y") { $atualizacao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($atualizacao__look)) { $atualizacao__look = $this->atualizacao_; }
?>
<span id="id_read_on_atualizacao_<?php echo $sc_seq_vert ; ?>" class="css_atualizacao__line" style="<?php echo $sStyleReadLab_atualizacao_; ?>"><?php echo $this->form_format_readonly("atualizacao_", $this->form_encode_input($atualizacao__look)); ?></span><span id="id_read_off_atualizacao_<?php echo $sc_seq_vert ; ?>" class="css_read_off_atualizacao_ css_atualizacao__line" style="<?php echo $sStyleReadInp_atualizacao_; ?>"><?php echo "<div id=\"idAjaxCheckbox_atualizacao_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_atualizacao__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_atualizacao__line"><?php $tempOptionId = "id-opt-atualizacao_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-atualizacao_ sc-ui-checkbox-atualizacao_<?php echo $sc_seq_vert ?>" name="atualizacao_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_atualizacao_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->atualizacao__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_atualizacao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_atualizacao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['exportacao_']) && $this->nmgp_cmp_hidden['exportacao_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="exportacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->exportacao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->exportacao__1 = explode(";", trim($this->exportacao_));
  } 
  else
  {
      if (empty($this->exportacao_))
      {
          $this->exportacao__1= array(); 
      } 
      else
      {
          $this->exportacao__1= $this->exportacao_; 
          $this->exportacao_= ""; 
          foreach ($this->exportacao__1 as $cada_exportacao_)
          {
             if (!empty($exportacao_))
             {
                 $this->exportacao_.= ";"; 
             } 
             $this->exportacao_.= $cada_exportacao_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_exportacao__line" id="hidden_field_data_exportacao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_exportacao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_exportacao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_exportacao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["exportacao_"]) &&  $this->nmgp_cmp_readonly["exportacao_"] == "on") { 

$exportacao__look = "";
 if (in_array("Y", $this->exportacao__1))  { $exportacao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<input type="hidden" name="exportacao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($exportacao_) . "\">" . $exportacao__look . ""; ?>
<?php } else { ?>

<?php

$exportacao__look = "";
 if (in_array("Y", $this->exportacao__1))  { $exportacao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "<br />";} 
?>
<span id="id_read_on_exportacao_<?php echo $sc_seq_vert ; ?>" class="css_exportacao__line" style="<?php echo $sStyleReadLab_exportacao_; ?>"><?php echo $this->form_format_readonly("exportacao_", $this->form_encode_input($exportacao__look)); ?></span><span id="id_read_off_exportacao_<?php echo $sc_seq_vert ; ?>" class="css_read_off_exportacao_ css_exportacao__line" style="<?php echo $sStyleReadInp_exportacao_; ?>"><?php echo "<div id=\"idAjaxCheckbox_exportacao_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_exportacao__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_exportacao__line"><?php $tempOptionId = "id-opt-exportacao_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-exportacao_ sc-ui-checkbox-exportacao_<?php echo $sc_seq_vert ?>" name="exportacao_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_exportacao_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->exportacao__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_exportacao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_exportacao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['impressao_']) && $this->nmgp_cmp_hidden['impressao_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="impressao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->impressao_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->impressao__1 = explode(";", trim($this->impressao_));
  } 
  else
  {
      if (empty($this->impressao_))
      {
          $this->impressao__1= array(); 
          $this->impressao_= "";
      } 
      else
      {
          $this->impressao__1= $this->impressao_; 
          $this->impressao_= ""; 
          foreach ($this->impressao__1 as $cada_impressao_)
          {
             if (!empty($impressao_))
             {
                 $this->impressao_.= ";"; 
             } 
             $this->impressao_.= $cada_impressao_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_impressao__line" id="hidden_field_data_impressao_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_impressao_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_impressao__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_impressao_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["impressao_"]) &&  $this->nmgp_cmp_readonly["impressao_"] == "on") { 

$impressao__look = "";
 if ($this->impressao_ == "Y") { $impressao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($impressao__look)) { $impressao__look = $this->impressao_; }
?>
<input type="hidden" name="impressao_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($impressao_) . "\">" . $impressao__look . ""; ?>
<?php } else { ?>

<?php

$impressao__look = "";
 if ($this->impressao_ == "Y") { $impressao__look .= "" . $this->Ini->Nm_lang['lang_opt_yes'] . "" ;} 
 if (empty($impressao__look)) { $impressao__look = $this->impressao_; }
?>
<span id="id_read_on_impressao_<?php echo $sc_seq_vert ; ?>" class="css_impressao__line" style="<?php echo $sStyleReadLab_impressao_; ?>"><?php echo $this->form_format_readonly("impressao_", $this->form_encode_input($impressao__look)); ?></span><span id="id_read_off_impressao_<?php echo $sc_seq_vert ; ?>" class="css_read_off_impressao_ css_impressao__line" style="<?php echo $sStyleReadInp_impressao_; ?>"><?php echo "<div id=\"idAjaxCheckbox_impressao_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_impressao__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_impressao__line"><?php $tempOptionId = "id-opt-impressao_" . $sc_seq_vert . "-1"; ?>
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-impressao_ sc-ui-checkbox-impressao_<?php echo $sc_seq_vert ?>" name="impressao_<?php echo $sc_seq_vert ?>[]" value="Y"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['Lookup_impressao_'][] = 'Y'; ?>
<?php  if (in_array("Y", $this->impressao__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><label for="<?php echo $tempOptionId ?>"><?php echo $this->Ini->Nm_lang['lang_opt_yes']; ?></label></TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_impressao_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_impressao_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_aplicacao_))
       {
           $this->nmgp_cmp_readonly['aplicacao_'] = $sCheckRead_aplicacao_;
       }
       if ('display: none;' == $sStyleHidden_aplicacao_)
       {
           $this->nmgp_cmp_hidden['aplicacao_'] = 'off';
       }
       if (isset($sCheckRead_acesso_))
       {
           $this->nmgp_cmp_readonly['acesso_'] = $sCheckRead_acesso_;
       }
       if ('display: none;' == $sStyleHidden_acesso_)
       {
           $this->nmgp_cmp_hidden['acesso_'] = 'off';
       }
       if (isset($sCheckRead_insercao_))
       {
           $this->nmgp_cmp_readonly['insercao_'] = $sCheckRead_insercao_;
       }
       if ('display: none;' == $sStyleHidden_insercao_)
       {
           $this->nmgp_cmp_hidden['insercao_'] = 'off';
       }
       if (isset($sCheckRead_remocao_))
       {
           $this->nmgp_cmp_readonly['remocao_'] = $sCheckRead_remocao_;
       }
       if ('display: none;' == $sStyleHidden_remocao_)
       {
           $this->nmgp_cmp_hidden['remocao_'] = 'off';
       }
       if (isset($sCheckRead_atualizacao_))
       {
           $this->nmgp_cmp_readonly['atualizacao_'] = $sCheckRead_atualizacao_;
       }
       if ('display: none;' == $sStyleHidden_atualizacao_)
       {
           $this->nmgp_cmp_hidden['atualizacao_'] = 'off';
       }
       if (isset($sCheckRead_exportacao_))
       {
           $this->nmgp_cmp_readonly['exportacao_'] = $sCheckRead_exportacao_;
       }
       if ('display: none;' == $sStyleHidden_exportacao_)
       {
           $this->nmgp_cmp_hidden['exportacao_'] = 'off';
       }
       if (isset($sCheckRead_impressao_))
       {
           $this->nmgp_cmp_readonly['impressao_'] = $sCheckRead_impressao_;
       }
       if ('display: none;' == $sStyleHidden_impressao_)
       {
           $this->nmgp_cmp_hidden['impressao_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_app_form_sec_groups_apps = $guarda_form_vert_app_form_sec_groups_apps;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr>
<tr id="sc-id-required-row"><td class="scFormPageText">
<span class="scFormRequiredOddColorMult">* <?php echo $this->Ini->Nm_lang['lang_othr_reqr']; ?></span>
</td></tr> 
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '15') ? " selected" : "";
?> 
           <option value="15" <?php echo $obj_sel ?>>15</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '30') ? " selected" : "";
?> 
           <option value="30" <?php echo $obj_sel ?>>30</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '40') ? " selected" : "";
?> 
           <option value="40" <?php echo $obj_sel ?>>40</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
</td></tr> 
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['maximized']))
  {
?>
</td></tr> 
<tr><td><table width="100%"> 
   <TABLE width="100%" class="scFormFooter">
    <TR align="center">
     <TD>
      <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
       <TR align="center" valign="middle">
        <TD align="left" rowspan="2" class="scFormFooterFont">
          
        </TD>
        <TD class="scFormFooterFont">
          
        </TD>
       </TR>
       <TR align="right" valign="middle">
        <TD class="scFormFooterFont">
          
        </TD>
       </TR>
      </TABLE>
     </TD>
    </TR>
   </TABLE><?php
  }
?>
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("app_form_sec_groups_apps");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("app_form_sec_groups_apps");
 parent.scAjaxDetailHeight("app_form_sec_groups_apps", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("app_form_sec_groups_apps", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("app_form_sec_groups_apps", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['sc_modal'])
{
?>
  parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
elseif ($this->lig_edit_lookup)
{
?>
  opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
}
?>
}
if (bLigEditLookupCall)
{
  scLigEditLookupCall();
}
<?php
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_t.sc-unique-btn-1").length && $("#sc_b_ini_t.sc-unique-btn-1").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_t.sc-unique-btn-2").length && $("#sc_b_ret_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_t.sc-unique-btn-3").length && $("#sc_b_avc_t.sc-unique-btn-3").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_t.sc-unique-btn-4").length && $("#sc_b_fim_t.sc-unique-btn-4").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_b.sc-unique-btn-5").length && $("#sc_b_upd_b.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_b.sc-unique-btn-6").length && $("#sc_b_sai_b.sc-unique-btn-6").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-7").length && $("#sc_b_sai_b.sc-unique-btn-7").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
		if ($("#sc_b_sai_b.sc-unique-btn-8").length && $("#sc_b_sai_b.sc-unique-btn-8").is(":visible")) {
			scFormClose_F6('<?php echo $nm_url_saida; ?>'); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['app_form_sec_groups_apps']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
