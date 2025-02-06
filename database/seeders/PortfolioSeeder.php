<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbPortfolio;

class PortfolioSeeder extends Seeder
{
    public function run()
    {

        TbPortfolio::create([
            'ds_tipo_projeto' => 'landing-page',
            'no_projeto' => 'Portfólio e Git/GitGub', 
            'no_cliente' => 'Dev em Dobro',
            'dt_inicio' => '2023-02-25', 
            'dt_finalizacao' => '2023-02-28',
            'ds_url_projeto' => 'https://felipeakel.github.io/projeto-final-github/',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/projeto-final-github',
            'ds_projeto' => 'Ao concluir o curso de Git e GitHub é importante praticar os comandos aprendidos para fixar o conteúdo. Logo, aproveitei para praticar o HTML e CSS para criar um mini portfólio para pra ticar os comandos.',
            'ds_tecnologia' => 'HTML | CSS',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'landing-page',
            'no_projeto' => 'Blade Runner',
            'no_cliente' => 'Dev em Dobro',
            'dt_inicio' => '2022-10-14',
            'dt_finalizacao' => '2022-10-17',
            'ds_url_projeto' => 'https://felipeakel.github.io/Brade-Runner/',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/Brade-Runner',
            'ds_projeto' => 'O template Blade Runner foi elaborado através de um evento online de tecnologia fornecido para equipe Dev em Dobro.

                Neste evento, foi possível praticar as linguagens de programação e elaborar um mini portfólio com HTML, CSS e JavaScript codificados do zero.',
            'ds_tecnologia' => 'HTML | CSS | JavaScript',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'landing-page',
            'no_projeto' => 'Mentoria Marcas Vivas',
            'no_cliente' => 'Roanito Monteiro',
            'dt_inicio' => '2023-01-08',
            'dt_finalizacao' => '2023-01-23',
            'ds_url_projeto' => 'https://roanitomonteiro.github.io/marcas-vivas/',
            'ds_url_repositorio' => 'https://github.com/RoanitoMonteiro/marcas-vivas',
            'ds_projeto' => 'O Mentoria Marcas Vivas trata-se de um layout landing page apresentando um serviço de mentoria individual. Composta de 4 seções com as seguintes informações:

                1º Seção: Cronômetro regressivo até o dia e hora do evento.
                2º e 3º Seção: Informações sobre os serviços.
                4º Seção: Informações do Autor.
                
                Utilizei um template licenciado que forneceu a estrutura básica do site e os arquivos de CSS e JavaScript. Todavia, precisei realizar alguns ajustes e correções para atender a necessidade do cliente.
            ',
            'ds_tecnologia' => 'HTML | CSS | JavaScript',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'php-laravel website',
            'no_projeto' => 'Sistema Gestão Musical - GM',
            'dt_inicio' => '2023-07-18',
            'ds_url_projeto' => 'https://www.linkedin.com/in/felipe-akel-carvalho-florentino-009412135/details/projects/?profileUrn=urn%3Ali%3Afsd_profile%3AACoAACD8nokBiMc468lBvggAWUavWkg-psSa2C0',
            'ds_projeto' => 'O sistema Gestão Musical - GM trata-se de um website responsável por apresentar o porfólio de um artista da música.

                Destaca-se, que o sistema é composto de 2 layouts distintos responsáveis por montar os ambientes. Primeiro, trata-se da área dos internautas de livre acesso. Segundo, trata-se da área dos administradores de acesso restrito. Dessa forma, será possível gerenciar as informações apresentadas do website além de garantir a segurança das informações.',
            'ds_tecnologia' => 'Laravel | PHP | HTML | CSS | JavaScript | MySQL | WebService',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'landing-page',
            'no_projeto' => 'The Last of Us',
            'no_cliente' => 'Dev em Dobro',
            'dt_inicio' => '2023-03-12',
            'dt_finalizacao' => '2023-03-15',
            'ds_url_projeto' => 'https://felipeakel.github.io/the-lest-of-us/',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/the-lest-of-us',
            'ds_projeto' => 'O template The Last of Us foi elaborado através de um evento online de tecnologia fornecido para equipe Dev em Dobro.
            
                Neste evento, foi possível praticar as linguagens de programação e elaborar um template da série HBO, The Last of Uf, com HTML, CSS e JavaScript codificados do zero.',
            'ds_tecnologia' => 'HTML | CSS | JavaScript',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'website landing-page',
            'no_projeto' => 'Super Mario Bros',
            'no_cliente' => 'Dev em Dobro',
            'dt_inicio' => '2023-03-31',
            'dt_finalizacao' => '2023-04-20',
            'ds_url_projeto' => 'https://felipeakel.github.io/super-mario-bros/',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/super-mario-bros',
            'ds_projeto' => 'O template Super Mário Bros foi elaborado através de um evento online de tecnologia fornecido para equipe Dev em Dobro.
                
                Neste evento, foi possível praticar as linguagens de programação e elaborar um template do filme de animação, Super Mário Bros. O filme, com HTML, CSS e JavaScript codificados do zero.',
            'ds_tecnologia' => 'HTML | CSS | JavaScript',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'php-laravel website',
            'no_projeto' => 'Super Gestão - SG',
            'dt_inicio' => '2023-12-05',
            'dt_finalizacao' => '2023-12-16',
            'ds_url_projeto' => 'https://www.linkedin.com/in/felipe-akel-carvalho-florentino-009412135/details/projects/?profileUrn=urn%3Ali%3Afsd_profile%3AACoAACD8nokBiMc468lBvggAWUavWkg-psSa2C0',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/Laravel-Super-Gestao',
            'ds_projeto' => 'O sistema Super Gestão - SG trata-se de um website responsável por gerenciar Produtos, Clientes e Vendas. Com isso, pode-se esperar funcionalidades como CRUD (Create, Read, Update, Delete), não somente isso, mas também Filtros, Envio de E-mails, Recuperação de dados de Endereço após preenchimento do CEP, entre outros recursos.

                Destaca-se, que o objetivo principal não foi elaborar um sistema robusto com diversas funcionalidades e um banco de dados de igual magnitude. E sim, consolidar meus estudos e apresentar meu código limpo, claro e com boas práticas utilizando o framework Laravel.',
            'ds_tecnologia' => 'Laravel | PHP | Bootstrap | HTML | CSS | JavaScript | MySQL | WebService',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'website',
            'no_projeto' => 'Art Fotografia',
            'dt_inicio' => '2024-01-09',
            'dt_finalizacao' => '2024-01-27',
            'ds_url_projeto' => 'https://felipeakel.github.io/Bootstrap5-Art-Fotografia/',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/Bootstrap5-Art-Fotografia',
            'ds_projeto' => 'Elaboração de template utilizando o framework front-end Bootstrap. Nota-se, que a tecnologia é baseada em estrutura de componentes para a criação dos layouts do projeto.

                Destaca-se, que o template foi desenvolvido em paralelo ao curso, Bootstrap 5 do básico ao avançado, para aprendizado a atualização dos recursos que o framework proporciona ao programadores.
            
                Além disso, foram adicionados recursos de validação de dados do formulário, incluído, um serviço de Webservice via CEP o qual retorna os dados de endereço.',
            'ds_tecnologia' => 'Bootstrap | HTML | CSS | JavaScript | WebService',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'website',
            'no_projeto' => 'E-commerce - Relógio',
            'dt_inicio' => '2024-01-25',
            'dt_finalizacao' => '2024-02-03',
            'ds_url_projeto' => 'https://felipeakel.github.io/Bootstrap5-Ecommerce/',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/Bootstrap5-Ecommerce',
            'ds_projeto' => 'O projeto trata-se da criação de um layout E-Commerce durante a realização do curso online, Bootstrap 5 do básico ao avançado, qual este template foi utilizado como práticas dos conhecimentos ensinados nas aulas.',
            'ds_tecnologia' => 'Bootstrap | HTML | CSS',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'angular',
            'no_projeto' => 'Lista de Tarefas', 
            'dt_inicio' => '2024-07-13', 
            'dt_finalizacao' => '2024-07-25',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/angular-lista-de-tarefas',
            'ds_projeto' => "A Lista de Tarefas trata-se de um programa desenvolvido para consolidar estudo/conhecimento em um projeto prático com o framework front-end, Angular. 
            
                Inicialmente, o programa possibilita criar uma lista de itens, tarefas que são gerenciados pelo usuário. Dessa forma, o usuário poderá 'cadastrar', 'editar' e 'excluir' seus dados. Além disso, poderá atualizar os status dos registros para 'pendentes' e 'concluídos'.",
            'ds_tecnologia' => 'Angular | HTML | CSS',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'angular',
            'no_projeto' => 'Portfólio Angular', 
            'dt_inicio' => '2024-07-27', 
            'dt_finalizacao' => '2024-08-03',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/Angular-Portfolio',
            'ds_projeto' => 'Mini portfólio desenvolvido em Angular para aprendizado e fixar o conhecimento adquirido ao estudar a tecnologia.',
            'ds_tecnologia' => 'Angular | HTML | CSS',
        ]);

        TbPortfolio::create([
            'ds_tipo_projeto' => 'php-laravel website',
            'no_projeto' => 'Portfólio Laravel - Felipe Akel', 
            'dt_inicio' => '2024-02-05', 
            'dt_finalizacao' => '2025-02-06',
            'ds_url_repositorio' => 'https://github.com/FelipeAkel/Portfolio-Laravel-Felipe-Akel',
            'ds_projeto' => 'O Portifólio Felipe Akel trata-se de um website desenvolvido em PHP Laravel com o objetivo de apresentar as informações do desenvolvedor, Felipe Akel.

                Destaca-se, que o sistema é composto de 2 layouts distintos responsáveis por montar o front-end dos ambientes. Primeiro, trata-se de área dos internautas de livre acesso. Segundo, trata-se da área administrativa do portfólio o qual possibilita o gerenciamento das informações do website. Com isso, o projeto desenvolvido em Laravel ganha autonomia para ações de CRUD - Create, Read, Update, Delete.',
            'ds_tecnologia' => 'Laravel | PHP | Bootstrap | HTML | CSS | JavaScript | MySQL',
        ]);

    }
}