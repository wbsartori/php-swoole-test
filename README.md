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
```
![docker ps](./public/images/docker_exec_php_cli.png)