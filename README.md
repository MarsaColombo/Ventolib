# Ventolib

### After Pulling

### Development

## Notion 

Open [Notion](https://www.notion.so/Vetolib-b6f9284ea77e408bb116458f21d9d434?pvs=4) to access the development site.


# run the development server:

- build docker image

```bash
docker-compose build
```

- start docker

```bash
docker-compose up -d
```

- stop docker

```bash
docker-compose up -d
```

To check the status of your containers:

```bash
docker-compose ps
```

Open [http://localhost:8000](http://localhost:8000) to access the development site.

---

## Good to know

### After pulling

- If `composer.json` changes:

```bash
docker-compose exec php composer install
```

- If `package.json` changes:

```bash
npm install
```

---

# Clear docker cache

```bash
docker system prune
```

# Rebuild Docker Images

If you make changes to the Dockerfile or need to rebuild the Docker images:

```bash
docker-compose build
```

---

# Clear Symfony Cache

To clear the Symfony cache:

```bash
docker-compose exec php bin/console cache:clear
```
