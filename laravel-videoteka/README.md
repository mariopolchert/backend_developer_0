### Dovrsetak sa predavanja

- u docker-compose.yml zamijeniti ports:
```bash
    ports:
      - ${FORWARD_DB_PORT}:3306
```
- u .env dodati:
```bash
    DB_PORT=3306
    FORWARD_DB_PORT=3307
```
- posjetiti aplikaciju na: http://localhost:8000/