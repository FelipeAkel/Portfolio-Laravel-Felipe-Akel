<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TbCarreiraProfissional;

class CarreiraProfissionalSeeder extends Seeder
{
    public function run()
    {
        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '1',
            'no_experiencia' => 'Segurança da Informação',
            'no_empresa' => 'Centro Universitário (IESB)',
            'dt_inicio' => '2016-04-30',
            'dt_final' => '2017-04-30',
            'st_trabalho_atual' => '0',
            'ds_formacao' => 'Pós-Graduação, Segurança da Informação, o curso é uma especialização que visa proteger a integridade das informações de empresas e desenvolver mecanismos que impeçam acessos não autorizados. 480 horas/aula.',
            'nr_total_horas' => 480,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '1',
            'no_experiencia' => 'Sistema de Informação',
            'no_empresa' => 'Centro Universitário do Distrito Federal (UDF)',
            'dt_inicio' => '2011-01-18',
            'dt_final' => '2014-12-18',
            'st_trabalho_atual' => '0',
            'ds_formacao' => 'Bacharelado, Sistema de Informação, o curso forma profissionais capazes de administrar o fluxo de informações geradas e distribuídas por redes de computadores dentro e fora de uma organização.',
            'nr_total_horas' => 3000,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '2',
            'no_experiencia' => 'Certified Scrum Developer® (CSD®)',
            'no_empresa' => 'Scrum Alliance',
            'dt_inicio' => '2022-05-31',
            'dt_final' => '2024-05-31',
            'st_trabalho_atual' => '0',
            'ds_formacao' => 'Os Certified Scrum Developers (CSD®) demonstram, por meio da formação, que possuem uma compreensão prática dos princípios do Scrum e do Agile e que adquirem competências de engenharia Agile especializadas.',
            'nr_total_horas' => 16,
            'ds_url' => 'https://bcert.me/bc/html/show-badge.html?b=yyvvmnew'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '3',
            'no_experiencia' => 'Analista Desenvolvedor PHP Jr',
            'no_empresa' => 'Globalweb Outsourcing do Brasil S.A.',
            'dt_inicio' => '2021-12-13',
            'dt_final' => null,
            'st_trabalho_atual' => '1',
            'ds_formacao' => '- Realizar atividades de manutenção e desenvolvimento de sistemas utilizando linguagem PHP e PHP Laravel; 
                - Modelagem de banco de dados Oracle; 
                - Apoiar no treinamento dos Trainnes do projeto; 
                - Gerar/Interpretar documentos e artefatos de acordo com a metodologia vigente;
            ',
            'nr_total_horas' => null,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '3',
            'no_experiencia' => 'Web Designer',
            'no_empresa' => 'Vert Soluções em Informática LTDA',
            'dt_inicio' => '2016-01-06',
            'dt_final' => '2020-07-14',
            'st_trabalho_atual' => '0',
            'ds_formacao' => '- Produção e manutenção de projetos utilizando a arquitetura MVC com linguagem em PHP 5.6.; 
                - Manutenção de web sites implementados em Joomla e WordPress; 
                - Buscar otimizar a experiência do usuário sobre os sistemas desenvolvidos, UX Designer; 
                - Auxiliar na elaboração de documentos dos sistemas a serem desenvolvidos, por exemplo, Levantamento de Requisitos Funcionais e Modelo Relacional do Banco de Dados;
                - Edição de imagens gráficas e criação de layout, com a ferramenta Adobe Photoshop e InDesign;
                - Atuando na área de suporte ao usuário esclarecendo dúvidas e treinamento de sistemas implementados;
                - Criação e configuração de questionários online, utilizando a ferramenta LimeSurvey e Google Forms;
            ',
            'nr_total_horas' => null,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '3',
            'no_experiencia' => 'Web Designer',
            'no_empresa' => 'Montreal Informática S.A.',
            'dt_inicio' => '2015-01-06',
            'dt_final' => '2016-01-06',
            'st_trabalho_atual' => '0',
            'ds_formacao' => '- Gestão de web site, com a ferramenta CMS Joomla, na publicação de artigos, correções de vulnerabilidade, liberação de acessos e atualização de templates;
                - Criação e edição de imagens gráficas e criação de layout, com a ferramenta Photoshop;
                - Atuando na área de suporte ao usuário na solução de problemas operacionais dos computadores e esclarecendo dúvidas de programas instalados;
                - Buscar soluções inteligentes para melhorar os templates e acessibilidade do portal institucional;
                - Correções de bugs para aumentar velocidade de páginas web para o usuário final;
                - Criação de diagramas e fluxogramas com Bootstrap e a ferramenta Cacoo;',
            'nr_total_horas' => null,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '3',
            'no_experiencia' => 'Técnico de Suporte em TI',
            'no_empresa' => 'Defensoria Pública da União',
            'dt_inicio' => '2013-05-23',
            'dt_final' => '2014-12-31',
            'st_trabalho_atual' => '0',
            'ds_formacao' => '- Atendimento ao usuário na soluções de problemas no computador, instalação, configuração de programas;
                - Realização de manutenção preventiva e corretiva em equipamentos de informática;
                - Elaboração de relatórios com programas do pacote Microsoft Office, Word, Excel, Power Point e Outlook;',
            'nr_total_horas' => null,
            'ds_url' => null
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Testes Unitários e TD com PHP e PHPUnit',
            'no_empresa' => 'Udemy',
            'dt_inicio' => '2023-12-27',
            'dt_final' => '2023-12-27',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 4.5,
            'ds_url' => 'https://www.udemy.com/certificate/UC-4b1e6e50-c568-40fd-a1a5-1cfb27b1eae8/'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Laravel 10 do básico ao avançado',
            'no_empresa' => 'Udemy',
            'dt_inicio' => '2023-12-15',
            'dt_final' => '2023-12-15',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 11,
            'ds_url' => 'https://www.udemy.com/certificate/UC-c643058d-54f1-4f77-93ba-404258266458/'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Dominando Banco de Dados com MySQL',
            'no_empresa' => 'Udemy',
            'dt_inicio' => '2023-03-28',
            'dt_final' => '2023-03-28',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 4,
            'ds_url' => 'https://www.udemy.com/certificate/UC-7614dd9f-7564-493e-8c4f-bc3e541fe587/'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Git e GitHub - Básico ao Avançado',
            'no_empresa' => 'Udemy',
            'dt_inicio' => '2023-02-25',
            'dt_final' => '2023-02-25',
            'st_trabalho_atual' => '0',
            'ds_formacao' => '',
            'nr_total_horas' => 8.5,
            'ds_url' => 'https://www.udemy.com/certificate/UC-7ec5cf9b-bfe5-49cb-8dc4-3f3cafb2466e/'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Produtividade Inteligente',
            'no_empresa' => 'Conquer Business School', 
            'dt_inicio' => '2023-02-13',
            'dt_final' => '2023-02-13',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 10,
            'ds_url' => 'https://conquerplus.com.br/certificates/6851ccaa-5aac-450f-a407-c17b31bda09e'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Padronização e Qualidade de Código',
            'no_empresa' => 'Globalweb',
            'dt_inicio' => '2022-06-03',
            'dt_final' => '2022-06-05',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 6,
            'ds_url' => 'https://drive.google.com/file/d/1PRuotd6EFg1pSBtZg1a1P8-Uh4wriqAN/view'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Ágil Scrum Guia Prático e Definitivo',
            'no_empresa' => 'Udemy',
            'dt_inicio' => '2022-05-05',
            'dt_final' => '2022-05-05',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 8.5,
            'ds_url' => 'https://www.udemy.com/certificate/UC-f6588992-8690-4625-8f58-1a1441a8cf35/'
        ]);
        
        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Processos e Metodologia Agile',
            'no_empresa' => 'Globalweb',
            'dt_inicio' => '2022-05-10',
            'dt_final' => '2022-05-12',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 3,
            'ds_url' => 'https://drive.google.com/file/d/1kclayTtHb85Zgmt5I1_IjqIS0QolMZps/view'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'PHP 7 Completo',
            'no_empresa' => 'Softblue',
            'dt_inicio' => '2021-11-18',
            'dt_final' => '2021-11-18',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 50 ,
            'ds_url' => 'https://www.softblue.com.br/certificado/526481C99E08'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Web: HTML5, CSS3, JavaScript e Ajax',
            'no_empresa' => 'Softblue',
            'dt_inicio' => '2021-06-15',
            'dt_final' => '2021-06-15',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 40,
            'ds_url' => 'https://www.softblue.com.br/certificado/494758EFA4F6'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Análise Orientada a Objetos',
            'no_empresa' => 'Softblue',
            'dt_inicio' => '2021-09-06',
            'dt_final' => '2021-09-06',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 8,
            'ds_url' => 'http://soft.blue/certificado/494865A4368A'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Lógica de programação',
            'no_empresa' => 'Softblue',
            'dt_inicio' => '2021-08-31',
            'dt_final' => '2021-08-31',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 20,
            'ds_url' => 'https://www.softblue.com.br/certificado/49486450F33E'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'Integração entre Java, HTML, CSS e JS',
            'no_empresa' => 'Softblue',
            'dt_inicio' => '2016-11-25',
            'dt_final' => '2016-11-25',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 8,
            'ds_url' => 'https://www.softblue.com.br/certificado/228925A56E2A'
        ]);

        TbCarreiraProfissional::create([
            'id_tipo_experiencia' => '4',
            'no_experiencia' => 'SQL Serve 2008',
            'no_empresa' => 'Logus TI',
            'dt_inicio' => '2013-11-23',
            'dt_final' => '2014-03-22',
            'st_trabalho_atual' => '0',
            'ds_formacao' => null,
            'nr_total_horas' => 60,
            'ds_url' => 'https://drive.google.com/file/d/13s4vhoWZNL83MA7SJZ4gZsUoFwkBMTqL/view?usp=sharing'
        ]);
    }
}
