
<?php
	echo "
	<div class='menu_position'>
			<div class='menu-container'>
    <ul class='menu clearfix'>
       
            <ul class='sub-menu clearfix'>
                
            </ul><!-- submenu -->
        
         <li><a href='#'>Correção de cadastro</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
                <li><a href='/ocorrencia/php/gestor/corrige_empregado.php'><i class='fa fa-building-o' aria-hidden='true'></i> de empregado</a>
            </ul><!-- submenu -->

        </li>
         <li><a href='/ocorrencia/php/gestor/aprova_ocorrencia.php'>Aprovar Ocorrências</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
            </ul><!-- submenu -->
        </li>

         <li><a href='#'>Relatório de Ocorrência</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
                <li><a href='/ocorrencia/php/gestor/relatorio/aprovadas.php'><i class='fa fa-building-o' aria-hidden='true'></i> Aprovadas</a>
                <li><a href='/ocorrencia/php/gestor/relatorio/nao_aprovadas.php'><i class='fa fa-user-o' aria-hidden='true'></i> Não Aprovadas</a></li>
                <li><a href='/ocorrencia/php/gestor/relatorio/relatorios.php'><i class='fa fa-line-chart' aria-hidden='true'></i> Relatórios</a></li>
                
            </ul><!-- submenu -->
            <li><a href='/ocorrencia/php/gestor/alterar_senha.php'><i class='fa fa-user-secret' aria-hidden='true'></i> alterar minha senha</a>
            <li class='selected'><a href='/ocorrencia/php/manutencao/deslogar.php'><i class='fa fa-power-off' aria-hidden='true'></i> Sair</a>
        </li>
    </ul>
</div>
</div> <!-- Menu position -->
";
?>