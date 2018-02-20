<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title><?php bloginfo('blogname'); wp_title(); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
  </head>
  <body>
    <!-- SVG-sprite -->
    <div style="display: none">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><symbol id="icon-fb" viewBox="0 0 16 28"><image data-name="&#x438;&#x43A;&#x43E;&#x43D;&#x43A;&#x430; &#x444;&#x435;&#x439;&#x441;&#x431;&#x443;&#x43A;" width="16" height="28" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAcCAQAAADCOPeRAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAAHdElNRQfiAR0CCyY6Nj6DAAAA40lEQVQoz+WTPU4DMRCFPztOBFGAciUiCg5AQTo6Ko4AdwjVVtQpaag4BTehSpUbJEUoghRFKwXFehTsYu8vB+BzM5p5Gr/xyIjKudWbVtprq62kmaPMK495NADgyJbKL7/lAsWCO1JqxIJpvYwxKsJj1pzk8ZwnTulxxntwf6nAQ5gqXNGPGm+aPBxoxHHBhB0brqLsNUvOgRELlKqLZ4voQn8JsJhugcMDXwgbDXrAY4ABHg01ViKjm8javVCiRGONHBkZAB9R309gXX0o2+yhJf2PBS1LCz/rZ2l7egzxQfANV7uA9eVR36cAAAAASUVORK5CYII="/></symbol><symbol id="icon-insta" viewBox="0 0 28 28"><image data-name="&#x438;&#x43A;&#x43E;&#x43D;&#x43A;&#x430; &#x438;&#x43D;&#x441;&#x442;&#x430;&#x433;&#x440;&#x430;&#x43C;" width="28" height="28" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAQAAADYBBcfAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAAHdElNRQfiAR0CDi5JmkL0AAAB00lEQVQ4y52VP0wTURzHP+96htiBhj+NgwkupCY0hIEQ4uTYhUQnjYOMMLloXFwYCIMOMDkAgcjgpolxwDhonDREYjTBoJshsQ5Nh5YKgbT3Zei7o9e+hoPfG+7d776f93v3+73fnREUeMIoPuJsMzTY5Rlv0E1dxG4b7ZBPEKnd9oyOuZRAuMwKdSDFLLPAMaol2tqgsCMrSdr3aCTa2pW2WeAlfKd6NLOBkoIH0azWvPhdpZv8JOA6U/jAOhvUAZ9p+1wVRyo+Kh8lY0ivHIqKC/wQQeF40QkaVegF9jggzRBwSJb/HRsvMQgUqVpVNYyYF3ogSVrriIfQvCTpqVCuGTHM6iEwCsA3Z6q2Acid5jcELwNZAIwTbHozQDoOpoC/AEw6wRsAlE8Jr2XFLwDcpc8BzgDw3YZoqeOYUFpHkqStjtS8tkW4JpSP13FMCD20gi1NRtCI3lnvc9ENRJ+iEm9rVcv6HN3/soouoNF7Zz9+1UAcbO8OUeARpZivxgITlOPCsDuCFt8iK9xinKt4/OMHb2MLhUrtS5L6nQfNNTKSpKpPDwBzvKQRa+uAAPDafB73Aegx+k2O81sRFS70Qb5nBHd4zDCphL+AgD8ssXEC7ZdCLVn3AxsAAAAASUVORK5CYII="/></symbol><symbol id="icon-tw" viewBox="0 0 34 28"><image data-name="&#x438;&#x43A;&#x43E;&#x43D;&#x43A;&#x430; &#x442;&#x432;&#x438;&#x442;&#x442;&#x435;&#x440;" width="34" height="28" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAcCAQAAACuPqWUAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QAAKqNIzIAAAAJcEhZcwAACxIAAAsSAdLdfvwAAAAHdElNRQfiAR0CDQMnaE1CAAABxklEQVQ4y52Vz4tNYRjHP2e6iKIkRoYsRrmTW5ISJsSCf0BTmtRQaNbWTDNqYiVliEgpKWSkFGUzU1JTYvwoCyNTFliM0kwW1GcW586595x77zv33O9ZvKfnnPfT+zzv837fSJpUF8fopoMZJnnCiyTeyR9E7JZFngHTeuZycaeP/OpaxE51OIi4bK2+OK7qEUE8repgQ8Q+G2nO/WJvG7AJgPNcrVuLiOsN6/SNo8gGxAsJedJSzTp2GdaVOJ2+VHDEYgrSGwDMekpiyPqaj9c87LIy5FAA8jT+pwD8YIDBVK799POTN3zgM1sCvTNXHsWC+NBWdLuykous4RYlis02b6Jf8dAG/KeP57TnRsBUJZ1SS6mo7ojTiXfgTkuIKaNqyAp/twAZWuilhZba7ERuSDELwcizfsyBeFvp6kK5vqt4yTRLcuzMuar3hDeSK5WJ6vNVfdRe54C0N4Is9V6TiDNpu8i6R4+jjvk3iLiR9Zx6dnjS2QDibu2MbOCAD4KruFnPhXGj21ztOnd7yXeL1OJEfSvH7Y42Vcz7GdvMpFPwuO8D0//52L2heylKrtGtHGQPXXSwshyZYZpPvGKM7+HmnQfg3ZYvr6khzgAAAABJRU5ErkJggg=="/></symbol><symbol id="icon-vk" viewBox="0 0 49 28"><image data-name="&#x438;&#x43A;&#x43E;&#x43D;&#x43A;&#x430; &#x432;&#x43A;" width="49" height="28" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAADEAAAAcCAYAAADIrlf0AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAAsSAAALEgHS3X78AAAAB3RJTUUH4gEdAg0qZdrVLgAACMpJREFUWMPFmHlsHNUdx79v7tmZPbyHd31svCa2E9skztEQ4qiA0jQkTalapRTMTSrR0v5TtUWVoPQSqIeQikQFSIjShBaiQNM6DYndkCYONImbw8YJMXFs42vX3vXu2us9Z+d4/SOFCkLYTQ/lJ/3+mHnv+/29j96beW+G7DjQB5vEYyQ8j8oKG9oWB0AIYFoUAKDIPCZnUnjj+DB4jgHLMKivdkGWOCxkNTTX+VDnd7bppnWHv0JZDaDG7ZAFQggLwMprupnXjAVNN89E4unXXn3z7KF0ToMs8qAAKKVwqxIkgYVpUWTzRaxfvgh5zcTOA/1QZQFVXjta6n0oGiYoBQpFA60hHwIeFd29w+BCgYoN19W4ty2u9uiSyFGvU5YBQiilFADnUESxoJmvswzpFHgWPMsgVOWCLHKIzWVR7bXf2Rj0vIorhCzykEUeANZUedRv5DW9o29oepdDEUEIwBAGkUQa2XwRPMsgXzRRKJr+9mXBhxVZsLEMySsSz7sdsmRalAKAaVmW2y473Q4bNxFKPU8Kmn5eFLhmlIjOt9/beG4keshhE7GsIYAbltagUNQxEVsIWRbdvKIx8BOGIf5SPmMz8zt7+sbuVyQBLENgUYrYXAa6YYEQYCFbxO0bWnc0BT33lfICAK1onGK33f+tuoBbXV+qsyLxtkgi/ZpqExGdy0CRBficCiZjqfk3jl88FU/lzrbWV95TyodlmGGHIu2u8TmwyO+EKgvIFw247DIEnkVtpTPQviz4AgCuHIjJ2MIJpufM2HMAzFKdg5XOr9plsf3d0RjCsTQ6376AvG6gymOH12VDLJntTmUKp0v55Aq6MRlLYTqRRiSexkg4iVSmgJxWxHQig6Df8QAAqRwAADg2MPEsV+t3vB+Op1+s8dofKiVYd33wmyxHjgXcduQKRUzFUhAFHjetqINWNFDUzREAqz/NIxJf0DqPDqLCLkMUWGhFA3nNQK6gQxI5vqHG83C5AOF4eu/YTOoQU9RNnBuNPVuOKFTlutcui0tODoYRT+XQ0z+OPx8dxJsnR9H59gXMJDOFUh6GaRVyBR2Foo5MXkdeM8EwDFJZDZ9bs/hhu01YVPYsnJ14nBCADbRtxen3ItGmoKe5skK5vpQwX9Dd+49f3JPJ6dANE4ZpIZ0tIrGQx8qmqi3VXvunzkTArb5169qG7q3tTaj1OzAaSYJlCZoWeVwdG6/fwzBELgegp3/8B7sOnd3DMgScr0IBpRQ9/WM/br2u8o5S4uUNgbs2r2145vSF6ROgwJZ1jbixtfaD5kwpPcsyjI1lAADx+Rx4ngUIsGF1/aMsy7jLAYgms12vH373Vw6bCJZlwbQvD+LLtzSj0q1eCMfTz5djsnltw/OUUsTmszg5GMYf/jqAp145hqHJhK2UdiGrGePRecTmsjg7HMXZkSj8FWpra33lI+XUBjD3ysGB7elcEQ5FAijAjEwlMRqew2g4ia4TF39JKS35plJkoW3bLS0/cqoiEqkcZuez4DkCy7KUUlpNNwxKgb6hafT0j8GlSPjKTc2/KRMArx85/8Cpwch0tVcFpfTShmmYFLphQRYFROLpseGp5NPlmH1mafVP/RVqy8kLESxfHMDNK+sRcNtdpXRF3RKnogsYmkxgLpPH129b9YTXZbulnJq956d+uPtv5/aqioBMofhhcqrMAwAIAQihOHF+6heNQc+DAEquz+1bV+5eWuddFU1mipOxlNoS8t1YSpPJa03jM3OQBA53b2q7b2VT1WPlAETnsp079vc/6VQkuFQJ1r/OdgDAXZxKfqTzO8MzcbfD9t2t6xp/V8rYqUqtW25s7Bscn+1wKtL9As/6SmmCfucWgeceUiSecSjic+UAAJh55rXeBxMLedT67NCKxkcayc9eOvLvCwKkc0WIAofv3dl+1KmIny2zyP819v19aPsfe86/VBdwgtLL28lv9535yA2WIZhOZNBa71v3xfVLjl1rgFSmMNj9j5EWhyJC5FmYlIJSQOCYD4G4SCJ9mdCiFAdPjR6v8jqeXr2k6jvXEsKpSm5NN9XTFyIZl3rpeSAA5jMaGIZcgpiMpS4TEkKQSOXwcvc7328J+T4vi1zrNeTwr2mufpFjyR0Xp5IYmoijwi5jaCoBgWMBAIzbLuPjWaFKWBL0IpnKmS/t77v3GgIAAJYu8n6tY+OynV6HDbmCAYciwqXKcKoSnKoEdtXGDuiGdVlqugmR59A3ND0T8NizoSrXpmvM0uarUG4Ynkq8kspqME0LhFxaTozEc7hSKpKAao8De44MPhVNZnZd6xkJBVxfeKRj/SECgnA8DYaQSzu2aVFcKQ3Tgt0mIp3X8OTOtzqiyczB/8VgCkVj/Nxo7PbJWOrXV6u1K+KGb2+7oStY6UAqqwEA2NWbOmBa1hVTN02IAoup2TRymr5rbUvtlwAE/huI33cP3DUwPLM3ldG6J6KpSGPQc9vV6J2K2LCqqWrR4TNje7MFAwxDCEolpUClSwHHMHpX7/DaeCp35D8FSOe04fcjcwdkkYfLLuHlrnde6Oq9WPKr8uPhd6vb77l1+WOGaYJdu/nukgIKwDAtNIe8oJSag2OzOxyKZLrs0oarLZ5cyB/mOGb3kjovRiNzmIylMDAcPVPrs7M1PsfNV+MVqnJtKGjGX8qGME2KOr8THqcNec1AOL5wVOS5LtUmtnMsU/LM9EGMhOd69x0b6pydz2EmkYFpWZjPaphJZg7ftKKuhmOZ1eV6AYDXafMxVyOguLSbCzwLh01CKqv1Hjg+1Hq0f3xzXjPepJ90sPlYCBw7XeOxw22X0bbYj9pKBziWgUMRMTg2+9BkbOGJqxmTKgu1Zf3b+aQgBLDbBFAKjE3Pdxd1o9tllz0uVdok8GwbyzDLbRLnEwXOoBQMASTdNE8MTsz+XJI58DwDwgIsIaCUQuRZ2CQB+48PPd4SqtyzotH/KIA1DCFZRRYyAFjTolauoBsMQ1gC8BalA386OvjYPwGBTuh89kRS7gAAAABJRU5ErkJggg=="/></symbol></svg>
    </div>
    <header class="header">
      <div class="header__panel">
        <button class="header__toggle" type="button">
          <span class="visually-hidden">Переключатель навигации</span>
          <span class="header__icon"></span>
          <span class="header__icon"></span>
          <span class="header__icon"></span>
        </button>
        <a href="<?php echo home_url(); ?>" class="header__logo"></a>
        <a href="" class="header__link">Скачать</a>
        <a href="" class="header__link header__link--active">Заказать</a>
        <a href="tel:<?php get_option('my_phone'); ?>" class="header__link header__link--phone"><?php echo get_option('my_phone'); ?></a>
        <button class="header__lang-btn header__lang-btn--active">ru</button>
        <button class="header__lang-btn">en</button>
      </div>
      <nav class="header__menu menu">
        <?php wp_nav_menu(array(
          'theme_location' => 'header_menu2',
          'menu_class' => 'menu__first-list',
          'container' => ''
        )); ?>
        <?php wp_nav_menu(array(
          'theme_location' => 'header_menu3',
          'menu_class' => 'menu__second-list',
          'container' => ''
        )); ?>
      </nav>
    </header>