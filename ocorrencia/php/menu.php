<?php
	echo "
	<div class='menu_position'>
			<div class='menu-container'>
    <ul class='menu clearfix'>
        <li><a href='#'>Cadastrar</a>
            <ul class='sub-menu clearfix'>
                <li><a href='/ocorrencia/php/dp/cadastro/cadastro_unidade.php'><i class='fa fa-building-o' aria-hidden='true'></i> Unidade</a>
                <li><a href='/ocorrencia/php/dp/cadastro/cadastro_empregado.php'><i class='fa fa-user-o' aria-hidden='true'></i> Empregado</a></li>
                <li><a href='/ocorrencia/php/dp/cadastro/cadastro_gestor.php'><i class='fa fa-user-o' aria-hidden='true'></i> Usuários</a></li>
                <li><a href='/ocorrencia/php/dp/cadastro/cadastro_setor.php'><i class='fa fa-users' aria-hidden='true'></i> Setor</a></li>
            </ul><!-- submenu -->
        </li>
  
        <li><a href='#'>Correção de Cadastros</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
                <li><a href='/ocorrencia/php/dp/correcao/corrige_unidade.php'><i class='fa fa-building-o' aria-hidden='true'></i> De Unidade</a>
                <li><a href='/ocorrencia/php/dp/correcao/corrige_empregado.php'><i class='fa fa-user-o' aria-hidden='true'></i> de Empregado</a></li>
                <li><a href='/ocorrencia/php/dp/correcao/corrige_setor.php'><i class='fa fa-users' aria-hidden='true'></i> de Setor</a></li>
                <li><a href='/ocorrencia/php/dp/correcao/corrige_gestor.php'><i class='fa fa-user-o' aria-hidden='true'></i> de Usuários</a></li>
            </ul><!-- submenu -->
        </li>

        <li><a href='#'>Bloqueio & Exclusão </a>
            <ul class='sub-menu clearfix'>
                <li><a href='../exclusao/exclui_unidade.php'><i class='fa fa-building-o' aria-hidden='true'></i> Unidade</a>
                <li><a href='../exclusao/exclui_empregado.php'><i class='fa fa-user-o' aria-hidden='true'></i> Empregado</a></li>
                <li><a href='../exclusao/bloqueia_gestor.php'><i class='fa fa-user-o' aria-hidden='true'></i> Usuários</a></li>
            </ul><!-- submenu -->
        </li>
        
         <li><a href='#'>Relatório de Ocorrência</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class='sub-menu clearfix'>
                <li><a href='../relatorio/relatorio_unidade.php'><i class='fa fa-building-o' aria-hidden='true'></i> por Unidade</a>
                <li><a href='../relatorio/relatorio_empregado.php'><i class='fa fa-user-o' aria-hidden='true'></i> por Empregado</a></li>
                <li><a href='../relatorio/relatorio_setor.php'><i class='fa fa-users' aria-hidden='true'></i> por Setor</a></li>
            </ul><!-- submenu -->
        </li>

        <li><a href='../relatorio/ocorrencias_aprovadas.php'>Ocorrências aprovadas</a>
        <li class='selected'><a href='/ocorrencia/php/manutencao/deslogar_admin.php'><i class='fa fa-power-off' aria-hidden='true'></i> Sair</a>
    </ul>
</div>
</div>";
?>