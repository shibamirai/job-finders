# 就職者情報閲覧サイト

Laravel 9 で作成

## 動作環境

- PHP Ver8.1以上
- composer

- git

## 実行方法

任意のフォルダでプロジェクトをクローンし、composerでプロジェクトに必要なPHPライブラリをインストールする。

```
> git clone https://github.com/shibamirai/job-finders.git
> cd job-finders
> composer install
```

.env_sampleをコピーして.envを作成する。  
SQLiteを使用するために、.envのデータベース接続情報を下記のように修正する。(下記以外のDB_xxxxという項目はすべて削除)
```
DB_CONNECTION=sqlite
```

また、databaseフォルダの中に database.sqlite という名前で空のファイルを作成する。
```
job-finders
 └─ database
     ├─ factories
     ├─ migrations
     ├─ seeders
     └─ database.sqlite   <-- 新規作成
```
マイグレーション。
```
> php artisan migrate
```
Laravelアプリを最初に立ち上げるときはアプリケーションキーを作る必要があるため、以下を実行して作成する。
```
> php artisan key:generate
```
起動する。
```
> php artisan serve
```
[http://localhost:8000](http://localhost:8000)で閲覧できる。(ただしデータは空っぽ)


## 管理者ユーザの作成

ログインしないとデータの入力ができないため、シーダーを使って管理者ユーザを作成する。(権限を設定しているわけではないので、厳密には管理者ではなくただの初期ユーザ)  
.envに下記設定を追加すると、シーダーでユーザを作成できるようにしている。
```
MANAGER_NAME=名前
MANAGER_EMAIL=メールアドレス
MANAGER_PASSWORD=パスワード
```
シーダー実行
```
> php artisan db:seed
```
このアカウント情報で画面右上の```管理者ログイン```からログインできる。

## ダミーデータの作成
Factoryクラスを作っているので、Tinkerを使って簡単にダミーデータを作成できる。


Tinkerを起動し、ポートフォリオなしの就職者を10名作成
```
> php artisan tinker
Psy Shell v0.11.1 (PHP 8.1.2 — cli) by Justin Hileman
>>> \App\Models\JobFinder::factory(10)->create();
```
ポートフォリオをその作者を同時に5個作成
```
>>> \App\Models\Work::factory(5)->create();
```
id=14の就職者にポートフォリオを2個追加
```
>>> \App\Models\Work::factory(2)->create(['job_finder_id' => 14]);
```
