# ----- Stage 1: Build -----
# Sử dụng node:18-alpine cho giai đoạn build
FROM node:18-alpine as builder

# Đặt thư mục làm việc
WORKDIR /app

# Copy package.json và package-lock.json (hoặc yarn.lock)
COPY package*.json ./
# Nếu dùng yarn: COPY yarn.lock ./

# Cài đặt dependencies
RUN npm install
# Nếu dùng yarn: RUN yarn install

# Copy toàn bộ source code
COPY . .

# Build ứng dụng React thành các file tĩnh
RUN npm run build

# ----- Stage 2: Serve -----
# Sử dụng một image nhẹ để phục vụ file tĩnh, ở đây dùng chính node + serve
# Hoặc bạn có thể dùng nginx:alpine (xem Bài 4)
FROM node:18-alpine

WORKDIR /app

# Cài đặt package 'serve' để phục vụ file tĩnh
# Bạn cũng có thể copy thư mục build sang image nginx
RUN npm install -g serve

# Copy thư mục build từ stage 'builder' sang stage hiện tại
COPY --from=builder /app/build ./build

# Expose cổng mà 'serve' sẽ chạy (mặc định là 3000)
EXPOSE 3000

# Lệnh chạy serve để phục vụ thư mục 'build'
# '-s' giúp xử lý routing cho single-page application
CMD ["serve", "-s", "build", "-l", "3000"]
