islandgift Конечная версия
===============================
## Информация
все крутится на nginx;
админка доступна по ссылке: https://www.islandgift.ru/kernel/siteadminka

## AMP and RSS
есть соответствующие страницы. Находятся в соответствующей дирректории.
в статьях не желательно использовать встроенные стили, вообще нигде не стоит их использовать

## Картинки
картинки продукции находятся на сайте. В гите картинок нет. И следовательно они не будут отображаться.
помимо этого загруженные картинки автоматически сжимаются. поэтому необходимо установить конвертор (imagisk)

##Файл конфигурации для nginx
имя файла islandgift.conf

Данные файла конфигурации
-------------------

```
#islandgift;
server {
	charset utf-8;
	client_max_body_size 128M;	

	root /var/www/html/islandgift;
	listen 80;
	server_name islandgift.local www.islandgift.local *.islandgift.local;
	index index.php index.html;
	
	access_log  /var/www/html/islandgiftLog/runtime/access.log;
	error_log   /var/www/html/islandgiftLog/runtime/error.log;

	location / {
	    # Redirect everything that isn't a real file to index.php
	    #try_files $uri $uri/ /index.php$is_args$args;
		try_files $uri $uri/ @rewrite;
		rewrite ^/siteerror/([^/]*)$ /siteerror.php?msg=$1? last;
		rewrite ^/product/(.*)$ /product.php?productid=$1? last;
		rewrite ^/amp/product/(.*)$ /amp/product.php?productid=$1? last;
		rewrite ^/article/(.*)$ /article.php?article=$1? last;
		rewrite ^/amp/article/(.*)$ /amp/article.php?article=$1? last;
		#rewrite ^/([^\.]+)$/$1.php break;
	}
	location @rewrite {
        rewrite ^ $uri.php last;
    }
	# deny accessing php files for the /assets directory
	location ~ ^/assets/.*\.php$ {
	    deny all;
	}

	location ~ \.php$ {
		include fastcgi_params;
		fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
		fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
		try_files $uri =404;
		fastcgi_read_timeout 30000; 
	}

	location ~* /\. {
	    deny all;
	}
	
	# expires заголовок для статичных файлов
	location ~* ^.+.(js|woff|ttf|eot|css|png|jpg|jpeg|gif|ico|svg)$ {
		   expires  max;
		   try_files $uri /index.php$is_args$args;
	}

	# for x-send
	location ^~ /data/ {
	    internal;
	    alias /var/www/html/islandgiftLog/common/data/;
	}
}

```
