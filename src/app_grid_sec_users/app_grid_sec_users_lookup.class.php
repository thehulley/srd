<?php
class app_grid_sec_users_lookup
{
//  
   function lookup_ativo(&$ativo) 
   {
      $conteudo = "" ; 
      if ($ativo == "Y")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_yes'] . "";
      } 
      if ($ativo == "N")
      { 
          $conteudo = "" . $this->Ini->Nm_lang['lang_opt_no'] . "";
      } 
      if (!empty($conteudo)) 
      { 
          $ativo = $conteudo; 
      } 
   }  
}
?>
