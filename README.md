# PHPでメールを送信する

Swift Mailerを使用したメール送信機能。  
mailコマンドだとメールの文字化けやSMTPの設定ができないため、  
Swift Mailer経由でメールを送信する。  
基本的にはPHPのmailの代用。

## 要件

・PHP7以上

## 設定
`setting.php` ファイルの定数を変更

## 使い方

```
composer install
```

実行後メールを送りたいPHPファイルからfunctionを参照する

``` php
<?php
require_once 'php_mail_function/index.php';
send_php_mail('to@test.com', 'Test Subject', 'Test Body', 'from@test.com', 'From Name');

```