# Projeto Toshiro Shibakita - Docker Swarm + AWS

## ☁️ Descrição

Projeto prático containerizado com PHP + Nginx + MySQL. Essa versão foi adaptada para rodar em produção com Docker Swarm, ideal para ambientes como AWS EC2.

## 📦 Serviços

- **PHP-FPM 8.1**
- **Nginx**
- **MySQL 5.7**

## 🌐 Deploy com Docker Swarm

### Pré-requisitos
- Docker e Docker Swarm configurado
- Duas ou mais instâncias EC2 (manager + workers)

### Passos

1. Inicie o swarm:
```bash
docker swarm init
