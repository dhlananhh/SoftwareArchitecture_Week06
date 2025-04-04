# Sử dụng base image Python 3.9
FROM python:3.9

# Thiết lập thư mục làm việc bên trong container
WORKDIR /app

# Sao chép file requirements.txt vào thư mục làm việc
COPY requirements.txt ./

# Cài đặt các thư viện Python từ requirements.txt
RUN pip install --no-cache-dir -r requirements.txt

# Sao chép toàn bộ mã nguồn của ứng dụng vào thư mục làm việc
COPY . .

# Thông báo rằng container sẽ lắng nghe trên cổng 5000
EXPOSE 5000

# Lệnh để chạy ứng dụng Flask khi container khởi động
# Sử dụng gunicorn hoặc flask run tùy thuộc môi trường (prod/dev)
# Ở đây dùng `flask run` cho đơn giản, cần --host=0.0.0.0
CMD ["flask", "run", "--host=0.0.0.0", "--port=5000"]
