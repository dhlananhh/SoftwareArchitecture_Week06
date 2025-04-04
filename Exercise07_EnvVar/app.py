import os

# Lấy giá trị biến môi trường 'APP_ENV'
# Cung cấp giá trị mặc định 'not_set' nếu biến không tồn tại
app_environment = os.getenv('APP_ENV', 'not_set')

print(f"Starting application in '{app_environment}' mode.")

# (Thêm logic ứng dụng của bạn ở đây nếu cần)
# Ví dụ:
if app_environment == 'production':
    print("Running PRODUCTION specific logic...")
else:
    print("Running DEVELOPMENT/other logic...")
