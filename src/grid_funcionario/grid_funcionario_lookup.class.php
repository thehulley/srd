<?php
class grid_funcionario_lookup
{
//  
   function lookup_funcao_id(&$conteudo , $funcao_id) 
   {   
      static $save_conteudo = "" ; 
      static $save_conteudo1 = "" ; 
      $tst_cache = $funcao_id; 
      if ($tst_cache === $save_conteudo && $conteudo != "&nbsp;") 
      { 
          $conteudo = $save_conteudo1 ; 
          return ; 
      } 
      $save_conteudo = $tst_cache ; 
      if (trim($funcao_id) === "" || trim($funcao_id) == "&nbsp;")
      { 
          $conteudo = "&nbsp;";
          $save_conteudo  = ""; 
          $save_conteudo1 = ""; 
          return ; 
      } 
      $nm_comando = "select descricao from funcao where id = $funcao_id order by descricao" ; 
      $conteudo = "" ; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      if ($rx = $this->Db->Execute($nm_comando)) 
      { 
          if (isset($rx->fields[0]))  
          { 
              $conteudo = trim($rx->fields[0]); 
          } 
          $save_conteudo1 = $conteudo ; 
          $rx->Close(); 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      if ($conteudo === "") 
      { 
          $conteudo = "&nbsp;";
          $save_conteudo1 = $conteudo ; 
      } 
   }  
//  
   function lookup_ativo(&$ativo) 
   {
      $conteudo = "" ; 
      if ($ativo == "Y")
      { 
          $conteudo = "Sim";
      } 
      if ($ativo == "N")
      { 
          $conteudo = "Não";
      } 
      if (!empty($conteudo)) 
      { 
          $ativo = $conteudo; 
      } 
   }  
}
?>
