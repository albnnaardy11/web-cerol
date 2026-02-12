# 🚀 Quick Start Guide - Deandles Cerol Library

## 📋 Prerequisites
- ✅ Laragon/XAMPP running
- ✅ MySQL database: `web-perpus-cerol`
- ✅ PHP 8.2+
- ✅ Node.js & npm installed

## ⚡ Quick Start (Already Running)

Sistem sudah berjalan! Akses langsung:

### 🌐 Public Website
```
http://127.0.0.1:8000
```

**Pages:**
- 🏠 Homepage: http://127.0.0.1:8000
- 📚 Books: http://127.0.0.1:8000/books
- 🎓 Education: http://127.0.0.1:8000/education
- 📧 Contact: http://127.0.0.1:8000/contact

### 🔐 Admin Panel
```
http://127.0.0.1:8000/login
```

**Credentials:**
- **Email**: `admin@deandles.com`
- **Password**: `password`

**Admin Routes:**
- 📊 Dashboard: http://127.0.0.1:8000/admin/dashboard
- 📖 Manage Books: http://127.0.0.1:8000/admin/books
- 🏷️ Manage Categories: http://127.0.0.1:8000/admin/categories
- 👥 Manage Users: http://127.0.0.1:8000/admin/users
- 💬 View Messages: http://127.0.0.1:8000/admin/messages

## 🎨 What's New?

### ✨ Design Highlights
1. **Glassmorphism Navbar** - Sticky, blur effect
2. **Animated Blobs** - Floating background decorations
3. **Premium Cards** - Rounded corners, shadows, hover effects
4. **Gradient Text** - Pink gradient untuk branding
5. **Icon Integration** - Font Awesome icons everywhere
6. **Responsive Grid** - Mobile-first, adaptive layouts

### 📚 Real Book Data
- Data buku diambil dari **Open Library API**
- Cover images dari internet (external URLs)
- ~50 buku real di 5 kategori
- Fallback ke dummy data jika API gagal

### 🎯 Key Features
- ✅ Search & Filter buku
- ✅ Category browsing
- ✅ Contact form dengan validation
- ✅ Admin CRUD operations
- ✅ File upload (images & PDFs)
- ✅ Role-based access control

## 🛠️ Common Commands

### Reset Database
```bash
php artisan migrate:fresh --seed
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Check Routes
```bash
php artisan route:list
```

### View Database
```bash
php artisan db:show
```

## 📱 Test Scenarios

### 1. Browse Books (Public)
1. Buka http://127.0.0.1:8000/books
2. Lihat cover images dari API
3. Coba search "fiction"
4. Filter by category "Fiksi"
5. Hover pada book cards

### 2. Submit Contact Form
1. Buka http://127.0.0.1:8000/contact
2. Isi form lengkap
3. Submit
4. Lihat success message
5. Login admin, cek di Messages

### 3. Admin - Add Book
1. Login sebagai admin
2. Go to Books > Add New Book
3. Fill form:
   - Title: "Test Book"
   - Author: "Test Author"
   - Category: Pilih salah satu
   - Stock: 10
   - Upload image (optional)
4. Save
5. Lihat di public books page

### 4. Admin - Dashboard Stats
1. Login sebagai admin
2. Lihat dashboard
3. Stats harus menampilkan:
   - Books: 50+
   - Categories: 5
   - Users: 2
   - Messages: (sesuai yang disubmit)

## 🎨 Design System

### Colors
```css
Primary: #FF69B4 → #FF1493 (Pink Gradient)
Secondary: #4A90E2 (Blue)
Success: #10B981 (Emerald)
Warning: #F59E0B (Amber)
Background: #FAFAFE (Off-white)
Text: #1E293B (Slate)
```

### Typography
```css
Font Family: 'Outfit' (body), 'Quicksand' (brand)
Headings: 800 weight, 5xl-7xl sizes
Body: 500 weight, relaxed line-height
Labels: UPPERCASE, wide tracking
```

### Spacing
```css
Rounded: 2rem - 3.5rem
Padding: 8-16 (cards), 4-6 (buttons)
Gap: 8-12 (grids)
```

## 🐛 Troubleshooting

### Images tidak tampil?
```bash
php artisan storage:link
```

### API tidak fetch buku?
- Check internet connection
- Open Library API mungkin slow/down
- Fallback data akan otomatis digunakan

### Vite assets tidak load?
```bash
npm run dev
```
Pastikan terminal npm run dev tetap running!

### Database error?
```bash
php artisan migrate:fresh --seed
```

### Cache issue?
```bash
php artisan optimize:clear
```

## 📊 Database Schema

### Users
- id, name, username, email, password, role

### Categories
- id, name, slug

### Books
- id, title, author, category_id, description, image, file_path, stock

### Messages
- id, name, email, subject, message

## 🎯 Next Steps

1. **Test semua fitur** - Gunakan TESTING_CHECKLIST.md
2. **Customize content** - Edit seeder untuk data lokal
3. **Add more features**:
   - Book borrowing system
   - User reviews & ratings
   - Reading history
   - Wishlist
   - Advanced search
4. **Deploy** - Siap untuk production!

## 📞 Support

Jika ada masalah:
1. Check TESTING_CHECKLIST.md
2. Check UPGRADE_SUMMARY.md
3. Clear cache & restart servers
4. Re-seed database

---

**Happy Reading! 📚✨**

*Deandles Cerol Library - Literasi Santuy untuk Generasi Cerdas*
