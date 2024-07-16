# PHP SWOOLE TEST

---

### Install

```bash
docker compose up -d --build
```

### View the created containers
```bash
docker container ps
```

![docker ps](./public/images/docker_ps.png)

---

### Access image php-cli


```bash
docker compose exec -it php-cli bash
```
![docker ps](./public/images/docker_exec_php_cli.png)

---

### Access image nginx

```bash
docker compose exec -it nginx bash
```
![docker ps](./public/images/docker_exec_php_cli.png)

---

### Install php dependencies

#### Access image from php-cli
```bash
docker compose exec -it php-cli bash

#Execute
root@117aa8bd6ca0:/var/www# composer install
```
![docker ps](./public/images/docker_composer_install.png)

---

### Check installation

#### Access image from php-cli
```bash
docker compose exec -it php-cli bash

#Execute
root@117aa8bd6ca0:/var/www# php index.php
```
![docker ps](./public/images/docker_version_swoole.png)