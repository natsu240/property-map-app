FROM node:20

WORKDIR /app

# 依存ファイルだけ先にコピーしてインストール（キャッシュ効かせる）
COPY package*.json ./

RUN npm install

# ソース全体をコピー
COPY . .

CMD ["npm", "run", "dev", "--", "--host"]