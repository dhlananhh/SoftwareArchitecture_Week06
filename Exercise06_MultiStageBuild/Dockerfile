# ----- Stage 1: Build Dependencies -----
FROM node:18 AS builder

WORKDIR /usr/src/app

# Copy package files
COPY package*.json ./

# Install ALL dependencies, including devDependencies (giả sử có bước build)
RUN npm install

# Copy source code
COPY . .

# --- Giả sử có bước build ở đây ---
# RUN npm run build  # Ví dụ: Nếu có script build trong package.json
# Kết quả build thường nằm trong thư mục /dist hoặc /build

# ----- Stage 2: Runtime -----
# Sử dụng image alpine nhẹ hơn cho runtime
FROM node:18-alpine

WORKDIR /usr/src/app

# Chỉ copy package.json để cài đặt production dependencies
COPY package*.json ./
RUN npm install --only=production --ignore-scripts # Chỉ cài dependencies cần cho runtime

# Copy ứng dụng đã build từ stage builder
# Nếu có thư mục build riêng (vd: /dist), copy thư mục đó:
# COPY --from=builder /usr/src/app/dist ./dist
# Nếu không có build step, chỉ copy file cần thiết:
COPY --from=builder /usr/src/app/app.js ./app.js

# Expose port
EXPOSE 3000

# Command to run the app
# Nếu có thư mục build, CMD có thể là: CMD [ "node", "dist/app.js" ]
CMD [ "node", "app.js" ]
