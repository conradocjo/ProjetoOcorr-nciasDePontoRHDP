
<?php
	echo "
	<div class='menu_position'>
			<div class='menu-container'>
    <ul class='menu clearfix'>
        
        
     
         <li><a href='/ocorrencia/php/seguranca_trabalho/aprova_ocorrencia.php'>Aprovar Ocorrências</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
            </ul><!-- submenu -->
        </li>

         <li><a href='#'>Relatório de Ocorrência</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
                <li><a href='/ocorrencia/php/seguranca_trabalho/relatorio/aprovadas.php'><i class='fa fa-building-o' aria-hidden='true'></i> Aprovadas</a>
                <li><a href='/ocorrencia/php/seguranca_trabalho/relatorio/nao_aprovadas.php'><i class='fa fa-user-o' aria-hidden='true'></i> Não Aprovadas</a></li>
                
            </ul><!-- submenu -->
            <li><a href='/ocorrencia/php/seguranca_trabalho/alterar_senha.php'><i class='fa fa-user-secret' aria-hidden='true'></i> alterar minha senha</a>
            <li class='selected'><a href='/ocorrencia/php/manutencao/deslogar.php'><i class='fa fa-power-off' aria-hidden='true'></i> Sair</a>
        </li>
    </ul>
</div>
</div> <!-- Menu position -->
";
?>