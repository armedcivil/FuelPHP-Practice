# AmazonLinux2023 + FuelPHP

## Dependencies

- Amazon Linux
  - version: 2023.4.20240611.0
- PHP
  - version: 7.3.1
- Nginx
  - version: 1.25.0

## Start Containers

```bash
cd AL2023_FuelPHP1.8
docker-compose up -d
```

## Install FuelPHP

Name of project directory must be "fuelphp".

```
AL2023_FuelPHP1.8
┝ docker/
│ ┝ app/
│ └ nginx/
┝ fuelphp/ <- project directory
└ docker-compose.yml
```

For example, manual installation of "FuelPHP 1.8.0" is following.

```bash
docker-compose exec -it app /bin/bash
```

```bash
wget https://fuelphp.com/files/download/36 -O fuelphp-1.8.zip
unzip fuelphp-1.8.zip
mv fuelphp-1.8/ fuelphp/       ;<- Important!!
rm fuelphp-1.8.zip
exit
```

### Why name of project directory must be "fuelphp"

Because, document root is `/var/www/fulephp/public` at Nginx's config.  
So, you can change name of project directory by modifing config of document root in `docker/nginx/default.conf`.  
\*\*\* Don't forget restarting container. \*\*\*
