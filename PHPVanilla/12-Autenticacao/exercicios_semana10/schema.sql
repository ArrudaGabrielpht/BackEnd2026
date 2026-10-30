-- Criar tabela para registrar tentativas de login
CREATE TABLE IF NOT EXISTS auditoria_logins (
    id SERIAL PRIMARY KEY,
    email VARCHAR(150) NOT NULL,
    ip VARCHAR(45) NOT NULL,
    user_agent TEXT,
    sucesso BOOLEAN NOT NULL,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);