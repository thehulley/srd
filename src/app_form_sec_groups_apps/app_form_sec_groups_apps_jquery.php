
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

  scJQCheckboxControl_general('')
  $('.sc-ui-checkbox-all-all').click(function() { scJQCheckboxControl('__ALL__', '__ALL__', this); });
  $('.sc-ui-checkbox-record-all').click(function() { scJQCheckboxControl('__ALL__', '__REC__', this); });

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["aplicacao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["acesso_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["insercao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["remocao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["atualizacao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["exportacao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["impressao_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["aplicacao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["aplicacao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["acesso_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["acesso_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["insercao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["insercao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["remocao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["remocao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["atualizacao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["atualizacao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["exportacao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["exportacao_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["impressao_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["impressao_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_grupo_id_' + iSeqRow).bind('change', function() { sc_app_form_sec_groups_apps_grupo_id__onchange(this, iSeqRow) });
  $('#id_sc_field_aplicacao_' + iSeqRow).bind('blur', function() { sc_app_form_sec_groups_apps_aplicacao__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_app_form_sec_groups_apps_aplicacao__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_app_form_sec_groups_apps_aplicacao__onfocus(this, iSeqRow) });
  $('#id_sc_field_acesso_' + iSeqRow).bind('blur', function() { sc_app_form_sec_groups_apps_acesso__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_app_form_sec_groups_apps_acesso__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_app_form_sec_groups_apps_acesso__onfocus(this, iSeqRow) });
  $('#id_sc_field_insercao_' + iSeqRow).bind('blur', function() { sc_app_form_sec_groups_apps_insercao__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_app_form_sec_groups_apps_insercao__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_app_form_sec_groups_apps_insercao__onfocus(this, iSeqRow) });
  $('#id_sc_field_remocao_' + iSeqRow).bind('blur', function() { sc_app_form_sec_groups_apps_remocao__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_app_form_sec_groups_apps_remocao__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_app_form_sec_groups_apps_remocao__onfocus(this, iSeqRow) });
  $('#id_sc_field_atualizacao_' + iSeqRow).bind('blur', function() { sc_app_form_sec_groups_apps_atualizacao__onblur(this, iSeqRow) })
                                          .bind('change', function() { sc_app_form_sec_groups_apps_atualizacao__onchange(this, iSeqRow) })
                                          .bind('focus', function() { sc_app_form_sec_groups_apps_atualizacao__onfocus(this, iSeqRow) });
  $('#id_sc_field_exportacao_' + iSeqRow).bind('blur', function() { sc_app_form_sec_groups_apps_exportacao__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_app_form_sec_groups_apps_exportacao__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_app_form_sec_groups_apps_exportacao__onfocus(this, iSeqRow) });
  $('#id_sc_field_impressao_' + iSeqRow).bind('blur', function() { sc_app_form_sec_groups_apps_impressao__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_app_form_sec_groups_apps_impressao__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_app_form_sec_groups_apps_impressao__onfocus(this, iSeqRow) });
  $('.sc-ui-checkbox-acesso_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-insercao_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-remocao_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-atualizacao_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-exportacao_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
  $('.sc-ui-checkbox-impressao_' + iSeqRow).on('click', function() { scMarkFormAsChanged(); });
} // scJQEventsAdd

function sc_app_form_sec_groups_apps_grupo_id__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
}

function sc_app_form_sec_groups_apps_aplicacao__onblur(oThis, iSeqRow) {
  do_ajax_app_form_sec_groups_apps_validate_aplicacao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_aplicacao__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_app_form_sec_groups_apps_aplicacao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_acesso__onblur(oThis, iSeqRow) {
  do_ajax_app_form_sec_groups_apps_validate_acesso_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_acesso__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_app_form_sec_groups_apps_acesso__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_insercao__onblur(oThis, iSeqRow) {
  do_ajax_app_form_sec_groups_apps_validate_insercao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_insercao__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_app_form_sec_groups_apps_insercao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_remocao__onblur(oThis, iSeqRow) {
  do_ajax_app_form_sec_groups_apps_validate_remocao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_remocao__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_app_form_sec_groups_apps_remocao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_atualizacao__onblur(oThis, iSeqRow) {
  do_ajax_app_form_sec_groups_apps_validate_atualizacao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_atualizacao__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_app_form_sec_groups_apps_atualizacao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_exportacao__onblur(oThis, iSeqRow) {
  do_ajax_app_form_sec_groups_apps_validate_exportacao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_exportacao__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_app_form_sec_groups_apps_exportacao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_impressao__onblur(oThis, iSeqRow) {
  do_ajax_app_form_sec_groups_apps_validate_impressao_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_app_form_sec_groups_apps_impressao__onchange(oThis, iSeqRow) {
  scMarkFormAsChanged();
  nm_check_insert(iSeqRow);
}

function sc_app_form_sec_groups_apps_impressao__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("aplicacao_", "", status);
	displayChange_field("acesso_", "", status);
	displayChange_field("insercao_", "", status);
	displayChange_field("remocao_", "", status);
	displayChange_field("atualizacao_", "", status);
	displayChange_field("exportacao_", "", status);
	displayChange_field("impressao_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_aplicacao_(row, status);
	displayChange_field_acesso_(row, status);
	displayChange_field_insercao_(row, status);
	displayChange_field_remocao_(row, status);
	displayChange_field_atualizacao_(row, status);
	displayChange_field_exportacao_(row, status);
	displayChange_field_impressao_(row, status);
}

function displayChange_field(field, row, status) {
	if ("aplicacao_" == field) {
		displayChange_field_aplicacao_(row, status);
	}
	if ("acesso_" == field) {
		displayChange_field_acesso_(row, status);
	}
	if ("insercao_" == field) {
		displayChange_field_insercao_(row, status);
	}
	if ("remocao_" == field) {
		displayChange_field_remocao_(row, status);
	}
	if ("atualizacao_" == field) {
		displayChange_field_atualizacao_(row, status);
	}
	if ("exportacao_" == field) {
		displayChange_field_exportacao_(row, status);
	}
	if ("impressao_" == field) {
		displayChange_field_impressao_(row, status);
	}
}

function displayChange_field_aplicacao_(row, status) {
}

function displayChange_field_acesso_(row, status) {
}

function displayChange_field_insercao_(row, status) {
}

function displayChange_field_remocao_(row, status) {
}

function displayChange_field_atualizacao_(row, status) {
}

function displayChange_field_exportacao_(row, status) {
}

function displayChange_field_impressao_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_app_form_sec_groups_apps_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(32);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd

var api_cache_requests = [];
function ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, hasRun, img_before){
    setTimeout(function(){
        if(img_name == '') return;
        iSeqRow= iSeqRow !== undefined && iSeqRow !== null ? iSeqRow : '';
        var hasVar = p.indexOf('_@NM@_') > -1 || p_cache.indexOf('_@NM@_') > -1 ? true : false;

        p = p.split('_@NM@_');
        $.each(p, function(i,v){
            try{
                p[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p[i] = v;
            }
        });
        p = p.join('');

        p_cache = p_cache.split('_@NM@_');
        $.each(p_cache, function(i,v){
            try{
                p_cache[i] = $('[name='+v+iSeqRow+']').val();
            }
            catch(err){
                p_cache[i] = v;
            }
        });
        p_cache = p_cache.join('');

        img_before = img_before !== undefined ? img_before : $(t).attr('src');
        var str_key_cache = '<?php echo $this->Ini->sc_page; ?>' + img_name+field+p+p_cache;
        if(api_cache_requests[ str_key_cache ] !== undefined && api_cache_requests[ str_key_cache ] !== null){
            if(api_cache_requests[ str_key_cache ] != false){
                do_ajax_check_file(api_cache_requests[ str_key_cache ], field  ,t, iSeqRow);
            }
            return;
        }
        //scAjaxProcOn();
        $(t).attr('src', '<?php echo $this->Ini->path_icones ?>/scriptcase__NM__ajax_load.gif');
        api_cache_requests[ str_key_cache ] = false;
        var rs =$.ajax({
                    type: "POST",
                    url: 'index.php?script_case_init=<?php echo $this->Ini->sc_page; ?>',
                    async: true,
                    data:'nmgp_opcao=ajax_check_file&AjaxCheckImg=' + encodeURI(img_name) +'&rsargs='+ field + '&p=' + p + '&p_cache=' + p_cache,
                    success: function (rs) {
                        if(rs.indexOf('</span>') != -1){
                            rs = rs.substr(rs.indexOf('</span>') + 7);
                        }
                        if(rs.indexOf('/') != -1 && rs.indexOf('/') != 0){
                            rs = rs.substr(rs.indexOf('/'));
                        }
                        rs = sc_trim(rs);

                        // if(rs == 0 && hasVar && hasRun === undefined){
                        //     delete window.api_cache_requests[ str_key_cache ];
                        //     ajax_check_file(img_name, field  ,t, p, p_cache, iSeqRow, 1, img_before);
                        //     return;
                        // }
                        window.api_cache_requests[ str_key_cache ] = rs;
                        do_ajax_check_file(rs, field  ,t, iSeqRow)
                        if(rs == 0){
                            delete window.api_cache_requests[ str_key_cache ];

                           // $(t).attr('src',img_before);
                            do_ajax_check_file(img_before+'_@@NM@@_' + img_before, field  ,t, iSeqRow)

                        }


                    }
        });
    },100);
}

function do_ajax_check_file(rs, field  ,t, iSeqRow){
    if (rs != 0) {
        rs_split = rs.split('_@@NM@@_');
        rs_orig = rs_split[0];
        rs2 = rs_split[1];
        try{
            if(!$(t).is('img')){

                if($('#id_read_on_'+field+iSeqRow).length > 0 ){
                                    var usa_read_only = false;

                switch(field){

                }
                     if(usa_read_only && $('a',$('#id_read_on_'+field+iSeqRow)).length == 0){
                         $(t).html("<a href=\"javascript:nm_mostra_doc('0', '"+rs2+"', 'app_form_sec_groups_apps')\">"+$('#id_read_on_'+field+iSeqRow).text()+"</a>");
                     }
                }
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href', target.join(','));
                }else{
                    var target = $(t).attr('href').split(',');
                     target[1] = "'"+rs2+"'";
                     $(t).attr('href', target.join(','));
                }
            }else{
                $(t).attr('src', rs2);
                $(t).css('display', '');
                if($('#id_ajax_doc_'+field+iSeqRow+' a').length > 0){
                    var target = $('#id_ajax_doc_'+field+iSeqRow+' a').attr('href').split(',');
                    target[1] = "'"+rs2+"'";
                    $(t).attr('href', target.join(','));
                }else{
                     var t_link = $(t).parent('a');
                     var target = $(t_link).attr('href').split(',');
                     target[0] = "javascript:nm_mostra_img('"+rs_orig+"'";
                     $(t_link).attr('href', target.join(','));
                }

            }
            eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        } catch(err){
                        eval("window.var_ajax_img_"+field+iSeqRow+" = '"+rs_orig+"';");

        }
    }
   /* hasFalseCacheRequest = false;
    $.each(api_cache_requests, function(i,v){
        if(v == false){
            hasFalseCacheRequest = true;
        }
    });
    if(hasFalseCacheRequest == false){
        scAjaxProcOff();
    }*/
}

$(document).ready(function(){
});


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

function scJQCheckboxControl_general(mainContainer) {
    $(mainContainer + '.sc-ui-checkbox-acesso_-control').click(function() { scJQCheckboxControl('acesso_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-insercao_-control').click(function() { scJQCheckboxControl('insercao_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-remocao_-control').click(function() { scJQCheckboxControl('remocao_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-atualizacao_-control').click(function() { scJQCheckboxControl('atualizacao_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-exportacao_-control').click(function() { scJQCheckboxControl('exportacao_', '__ALL__', this); });
    $(mainContainer + '.sc-ui-checkbox-impressao_-control').click(function() { scJQCheckboxControl('impressao_', '__ALL__', this); });
    $('.sc-ui-checkbox-all-all').click(function() { scJQCheckboxControl('__ALL__', '__ALL__', this); });
    $('.sc-ui-checkbox-record-all').click(function() { scJQCheckboxControl('__ALL__', '__REC__', this); });
}

function scJQCheckboxControl_updateShow() {
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-acesso_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-acesso_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-insercao_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-insercao_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-remocao_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-remocao_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-atualizacao_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-atualizacao_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-exportacao_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-exportacao_-control').prop("checked"));
    $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-impressao_-control').prop("checked", $('#div_hidden_bloco_0 .sc-ui-checkbox-impressao_-control').prop("checked"));
}

function scJQCheckboxControl_updateHide() {
    $('#div_hidden_bloco_0 .sc-ui-checkbox-acesso_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-acesso_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-insercao_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-insercao_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-remocao_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-remocao_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-atualizacao_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-atualizacao_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-exportacao_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-exportacao_-control').prop("checked"));
    $('#div_hidden_bloco_0 .sc-ui-checkbox-impressao_-control').prop("checked", $('#sc-id-fixedheaders-placeholder .sc-ui-checkbox-impressao_-control').prop("checked"));
}

function scJQCheckboxControl(sColumn, sSeqRow, oCheckbox) {
  var iSeqRow = '';

  if ('__ALL__' == sColumn || 'acesso_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_acesso_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'acesso_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'insercao_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_insercao_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'insercao_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'remocao_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_remocao_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'remocao_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'atualizacao_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_atualizacao_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'atualizacao_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'exportacao_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_exportacao_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'exportacao_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

  if ('__ALL__' == sColumn || 'impressao_' == sColumn) {
    iSeqRow = ('__REC__' == sSeqRow) ? $(oCheckbox).attr('alt') : '';
    scJQCheckboxControl_impressao_(iSeqRow, oCheckbox.checked);
    if ('__REC__' == sSeqRow) {
      nm_check_insert(iSeqRow);
    }
    else {
      if ('__ALL__' == sColumn || 'impressao_' == sColumn) {
         for (var i = 1; i <= iAjaxNewLine; i++) {
           nm_check_insert(i);
         }
      }
    }
    if ('__ALL__' == sColumn && '__ALL__' == sSeqRow) {
      var $oCheckbox = $(".sc-ui-checkbox-record-all");
      for (var i = 0; i < $oCheckbox.length; i++) {
        if (oCheckbox.checked != $oCheckbox[i].checked) {
          $oCheckbox[i].checked = oCheckbox.checked;
        }
      }
    }
  }

} // scJQCheckboxControl

function scJQCheckboxControl_acesso_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-acesso_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-acesso_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_acesso_

function scJQCheckboxControl_insercao_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-insercao_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-insercao_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_insercao_

function scJQCheckboxControl_remocao_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-remocao_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-remocao_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_remocao_

function scJQCheckboxControl_atualizacao_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-atualizacao_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-atualizacao_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_atualizacao_

function scJQCheckboxControl_exportacao_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-exportacao_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-exportacao_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_exportacao_

function scJQCheckboxControl_impressao_(iSeqRow, bChecked) {
  if ('__ALL__' == iSeqRow) {
    var $oCheckbox = $(".sc-ui-checkbox-impressao_");
  }
  else {
    var $oCheckbox = $(".sc-ui-checkbox-impressao_" + iSeqRow);
  }

  var bChanged = false, lcsObjects;
  for (var i = 0; i < $oCheckbox.length; i++) {
    if (bChecked != $oCheckbox[i].checked && !$oCheckbox[i].disabled) {
      $oCheckbox[i].checked = bChecked;
      nm_check_insert(iSeqRow);
      lcsObjects = $($oCheckbox[i]).parent().find(".lcs_switch");
      if (lcsObjects.length) {
        if (bChecked) {
          lcsObjects.lcs_on();
        }
        else {
          lcsObjects.lcs_off();
        }
      }
      bChanged = true;
    }
  }
} // scJQCheckboxControl_impressao_

function scGetFileExtension(fileName)
{
    fileNameParts = fileName.split(".");

    if (1 === fileNameParts.length || (2 === fileNameParts.length && "" == fileNameParts[0])) {
        return "";
    }

    return fileNameParts.pop().toLowerCase();
}

function scFormatExtensionSizeErrorMsg(errorMsg)
{
    var msgInfo = errorMsg.split("||"), returnMsg = "";

    if ("err_size" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_size'] ?>. <?php echo $this->Ini->Nm_lang['lang_errm_file_size_extension'] ?>".replace("{SC_EXTENSION}", msgInfo[1]).replace("{SC_LIMIT}", msgInfo[2]);
    } else if ("err_extension" == msgInfo[0]) {
        returnMsg = "<?php echo $this->Ini->Nm_lang['lang_errm_file_invl'] ?>";
    }

    return returnMsg;
}

