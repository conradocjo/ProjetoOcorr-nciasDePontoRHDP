
<?php
	echo "
	<div class='menu_position'>
			<div class='menu-container'>
    <ul class='menu clearfix'>
        <li><a href='#'>Cadastrar</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
                <li><a href='/ocorrencia/php/gestor/cadastro/cadastro_unidade.php'><i class='fa fa-building-o' aria-hidden='true'></i> Unidade</a>
                <li><a href='/ocorrencia/php/gestor/cadastro/cadastro_empregado.php'><i class='fa fa-user-o' aria-hidden='true'></i> Empregado</a></li>
                <li><a href='/ocorrencia/php/gestor/cadastro/cadastro_setor.php'><i class='fa fa-users' aria-hidden='true'></i> Setor</a></li>
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
                
            </ul><!-- submenu -->

            <li class='selected'><a href='/ocorrencia/php/manutencao/deslogar.php'><i class='fa fa-power-off' aria-hidden='true'></i> Sair</a>
        </li>
    </ul>
</div>
</div> <!-- Menu position -->
";
?>