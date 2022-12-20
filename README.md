**Requirement**

[Docker Desktop](https://www.docker.com/products/docker-desktop/)

**Build**

```
docker-compose -f docker-compose.yml --env-file ./docker/.env build

or 

make dc_build
```

**Run**

```
docker-compose -f docker-compose.yml --env-file ./docker/.env up

or

make dc_up
```



