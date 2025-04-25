
# Projeto Toshiro Shibakita - Docker Swarm + AWS

## ☁️ Descrição

Projeto prático containerizado com PHP + Nginx + MySQL. Essa versão foi adaptada para rodar em produção com Docker Swarm, ideal para ambientes como AWS EC2.

## 📦 Serviços

- **PHP-FPM 8.1**
- **Nginx**
- **MySQL 5.7**

## 🌐 Deploy com Docker Swarm

### ✅ Pré-requisitos

- Docker e Docker Swarm instalados
- Duas ou mais instâncias EC2 (1 manager + N workers)
- Porta 2377 (gerenciamento), 7946 (comunicação interna) e 4789 (overlay network) liberadas no Security Group da AWS

### 🚀 Passos para Deploy

1. **Inicie o Swarm na instância manager:**

```bash
docker swarm init --advertise-addr <IP_DA_INSTANCIA_MANAGER>
```

2. **Adicione os nós workers:**

Copie o comando `docker swarm join` gerado pelo init e execute nas instâncias workers.

3. **Clone o repositório na máquina manager:**

```bash
git clone https://github.com/devcelsoborges/cluster-docker-swarm.git 
cd seu-repo
```

4. **Crie uma network overlay:**

```bash
docker network create -d overlay toshiro_net
```

5. **Deploy da stack:**

```bash
docker stack deploy -c docker-compose.yml toshiro
```

6. **Verifique os serviços:**

```bash
docker stack services toshiro
```

## 📁 Estrutura do Projeto

```plaintext
.
├── docker-compose.yml
├── nginx/
│   └── default.conf
├── php/
│   └── Dockerfile
├── src/
│   └── index.php
└── .env
```

## ⚙️ Variáveis de Ambiente

Crie um arquivo `.env` com o seguinte conteúdo:

```env
MYSQL_ROOT_PASSWORD=sua_senha_root
MYSQL_DATABASE=nome_banco
MYSQL_USER=usuario
MYSQL_PASSWORD=senha
```

## 🛠️ Comandos Úteis

- Subir os serviços:
  ```bash
  docker stack deploy -c docker-compose.yml toshiro
  ```

- Ver logs de um serviço:
  ```bash
  docker service logs toshiro_php --follow
  ```

- Escalar um serviço:
  ```bash
  docker service scale toshiro_php=3
  ```

## 📌 Observações

- Certifique-se de que o diretório `src/` tem permissões corretas para o PHP.
- Configure seu DNS ou use o IP público da instância manager para acessar o app.

## 🧪 Testando

Acesse `http://<IP_DA_INSTANCIA_MANAGER>` no navegador. Você deve ver a página inicial do PHP.
