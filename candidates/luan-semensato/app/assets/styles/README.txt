/// REGRAS GERAIS ///

  * Reduzir, quando possivel, as requisições de CSS por página.
  * Separar por quebra de linha seletores combinados.
  * Usar padrão de nomeclatura nas classes (descrito mais abaixo).
  * Quebrar arquivos de estilo muito grandes em componentes menores.
  * Evite usar ID para estilizar. Usar apenas para elementos de tagueamento, labels, manipulação com js e links internos da página.
  * Evite usar !important. Salvo as classes utilitárias.
  * Seja generoso com os comentários.
  * Estilos padrões de layout, como cores, fontes, bordas, paddings, etc... devem ser usados com variáveis.



/// NOMECLATURA DE CLASSES ///

  u-element     => CLASSES ULTILITÁRIAS
                   Classes com um ou mais estilos específicos. Utilizam o !important para forçar as alterações

  g-element     => CLASSES DE GRID
                   Usadas para elementos de estrutura. Trabalham com flutuações, larguras e margins horizontais

  c-element     => CLASSES DE COMPONENTE
                   Módulos reaproveitaveis dentro do site.
                   As classes sem prefixos dentro dos componentes só podem receber estilos do próprio componente ou dos arquivos da pasta base.
                   É válido usar componentes dentro de componentes e classes modificadoras do próprio componente para aplicar pequenas diferenças.

  is-state      => CLASSES DE ESTADO
                   Usadas para modificar o estado atual ou um comportamento do elemento.
                   Inseridas via JS. Ex: is-hidden, is-collapsed, is-active.

  content       => NOMES EM INGLÊS
                   Usar o padrão de nomeclatura das classes com termos, adjetivos, etc, em inglês. Salvo exceções que o termo seja um nome próprio ou uma sessão nomeada do site.

  main-nav      => NOMES COMPOSTOS
                   Padrão para nomear qualquer elemento com um nome composto.
                   Palavras em minusculas separadas por hífen.

  .c-header__superior => CLASSES DESCENDENTES
                   Usadas para relacionar uma hierarquia entre um elemento pai (prefixo) e seu descendente / elemento filho (sulfixo).
                   Podem ser utilizadas para criar sub-componentes dentro de um componente, assim, não havendo necessidade de criar um novo.
                   A classe obrigatoriamente deve estar dentro da classe principal Ex: .c-header .c-header__inner

  .main--variation => CLASSES DE MODIFICAÇÃO
                   Sobrescrever estilos especificos de uma classe já existente. Usar o seletor modificado após o seletor original, aproveitando a cascata de estilos(css). ex: .main {...} .main--variation {...}

  icon-arrow       => CLASSES DE ÍCONES / SPRITE
                   Os ícones/imagens são utilizados via sprite, gerador automaticamente.
                   Usa prefixo icon- seguido pelo nome do arquivo. Ex: arrow.png => .icon-arrow



/// DIRETÓRIOS BÁSICOS ///

  styles/
  |– util/
  |   |– _functions.scss     # Funções gerais/genéricas da aplicação
  |   |– _utility-class.scss # Classes utilitárias (u-)
  |
* |– base/
  |   |– _reset.scss       # Reset/normalize
  |   |– _typography.scss  # Declarações de fonte-face, funções e estilizações de textos gerais
  |   |– _basic.scss       # Estilos básicos que afetam todo o site e estilização das demais tags básicas do html
  |   |– _grid.scss        # Clearfix, funções para grids e classes de grid (g-)
  |   |– _form.scss        # Estilos gerais dos elementos basicos de formulários
  |
  |– components/ (classes de componentes [c-])
  |   |– _.scss            #
  |   |– _.scss            #
  |   |– _.scss            #
  |   ...                  # Etc…
  |
  |– pages/ (classes personalizadas para uma página específica)
  |   |– _.scss            #
  |   |– _.scss            #
  |   |– _.scss            #
  |   ...                  # Etc…
  |
  `– application.scss      # Arquivo principal
  `– print.scss            # Estilos para impressão
  `– vendor.scss           # Vendors file
  `– ie#.scss              # Hacks para versões do IE
  `– README.txt            # CSS model developer especifications


* importar na mesma ordem acima descrita