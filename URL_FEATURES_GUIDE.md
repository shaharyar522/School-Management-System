# 🎓 School Management System - URL Guide & Features

## 📍 All Available URLs

### **Dashboard**
- `http://127.0.0.1:8000/admin/dashboard` - Dashboard with statistics

---

### **Users Management**
| URL | Operation | Method | Features |
|-----|-----------|--------|----------|
| `http://127.0.0.1:8000/admin/users` | List All Users | GET | View all users with roles, Edit, Delete |
| `http://127.0.0.1:8000/admin/users/create` | Create User | GET | Form to add new user (Admin, Teacher, Student, Parent) |
| `http://127.0.0.1:8000/admin/users/store` | Save User | POST | Store new user with profiles |
| `http://127.0.0.1:8000/admin/users/{id}/edit` | Edit User | GET | Edit form for existing user |
| `http://127.0.0.1:8000/admin/users/{id}` | Update User | PATCH | Save user changes |
| `http://127.0.0.1:8000/admin/users/{id}` | Delete User | DELETE | Remove user and profiles |

**User Roles:**
- Admin - System administrator
- Teacher - Teaching staff
- Student - Student with class assignment
- Parent - Parent/Guardian

---

### **Classes Management**
| URL | Operation | Method | Features |
|-----|-----------|--------|----------|
| `http://127.0.0.1:8000/admin/classes` | List All Classes | GET | View classes with statistics, Edit, Delete |
| `http://127.0.0.1:8000/admin/classes/create` | Create Class | GET | Form to add new class |
| `http://127.0.0.1:8000/admin/classes/store` | Save Class | POST | Store new class (unique name) |
| `http://127.0.0.1:8000/admin/classes/{id}/edit` | Edit Class | GET | Edit class name |
| `http://127.0.0.1:8000/admin/classes/{id}` | Update Class | PATCH | Save class changes |
| `http://127.0.0.1:8000/admin/classes/{id}` | Delete Class | DELETE | Remove class |

**Examples:**
- Class A, Class B, Grade 10, Section A, Level 1

---

### **Subjects Management**
| URL | Operation | Method | Features |
|-----|-----------|--------|----------|
| `http://127.0.0.1:8000/admin/subjects` | List All Subjects | GET | View subjects by class, Edit, Delete |
| `http://127.0.0.1:8000/admin/subjects/create` | Create Subject | GET | Form to add new subject |
| `http://127.0.0.1:8000/admin/subjects/store` | Save Subject | POST | Store new subject assigned to class |
| `http://127.0.0.1:8000/admin/subjects/{id}/edit` | Edit Subject | GET | Edit subject name and class |
| `http://127.0.0.1:8000/admin/subjects/{id}` | Update Subject | PATCH | Save subject changes |
| `http://127.0.0.1:8000/admin/subjects/{id}` | Delete Subject | DELETE | Remove subject |

**Examples:**
- Mathematics, English, Science, Social Studies, Physical Education

---

### **Exams Management**
| URL | Operation | Method | Features |
|-----|-----------|--------|----------|
| `http://127.0.0.1:8000/admin/exams` | List All Exams | GET | View exams with statistics, Edit, Delete |
| `http://127.0.0.1:8000/admin/exams/create` | Create Exam | GET | Form to add new exam |
| `http://127.0.0.1:8000/admin/exams/store` | Save Exam | POST | Store new exam (unique name) |
| `http://127.0.0.1:8000/admin/exams/{id}/show` | View Exam | GET | View exam details |
| `http://127.0.0.1:8000/admin/exams/{id}/edit` | Edit Exam | GET | Edit exam name |
| `http://127.0.0.1:8000/admin/exams/{id}` | Update Exam | PATCH | Save exam changes |
| `http://127.0.0.1:8000/admin/exams/{id}` | Delete Exam | DELETE | Remove exam |

**Examples:**
- Final Exam, Midterm, Unit Test, Class Test, Mock Exam

---

### **Exam Subjects Management** ⭐ NEW!
| URL | Operation | Method | Features |
|-----|-----------|--------|----------|
| `http://127.0.0.1:8000/admin/exam-subjects` | List Assignments | GET | View exam-subject assignments, Edit, Delete |
| `http://127.0.0.1:8000/admin/exam-subjects/create` | Create Assignment | GET | Form to assign exam to class subject |
| `http://127.0.0.1:8000/admin/exam-subjects/store` | Save Assignment | POST | Store exam-subject-class mapping with marks |
| `http://127.0.0.1:8000/admin/exam-subjects/{id}/show` | View Assignment | GET | View assignment details |
| `http://127.0.0.1:8000/admin/exam-subjects/{id}/edit` | Edit Assignment | GET | Edit exam/class/subject/marks |
| `http://127.0.0.1:8000/admin/exam-subjects/{id}` | Update Assignment | PATCH | Save assignment changes |
| `http://127.0.0.1:8000/admin/exam-subjects/{id}` | Delete Assignment | DELETE | Remove assignment |

**Assignment Fields:**
- Exam (e.g., Final Exam)
- Class (e.g., Class A)
- Subject (e.g., Mathematics)
- Total Marks (optional, e.g., 100)

---

### **Attendance Management**
| URL | Operation | Method | Features |
|-----|-----------|--------|----------|
| `http://127.0.0.1:8000/admin/attendance/create` | Mark Attendance | GET | Two-step form (select class, then mark) |
| `http://127.0.0.1:8000/admin/attendance/store` | Save Attendance | POST | Store attendance records |
| `http://127.0.0.1:8000/admin/attendance/report` | Attendance Report | GET | View all attendance with filters & export |
| `http://127.0.0.1:8000/admin/attendance/report/pdf` | Export PDF | GET | Download attendance as PDF |
| `http://127.0.0.1:8000/admin/attendance/report/excel` | Export Excel | GET | Download attendance as Excel |

---

## 🎨 UI Features by Page

### **List Pages (Index)**
- ✅ Purple gradient header with title
- ✅ "Add New" button in header
- ✅ Statistics box showing total count
- ✅ Professional table with hover effects
- ✅ Action buttons (Edit, Delete)
- ✅ Confirmation dialogs for delete
- ✅ Empty state with CTA when no data
- ✅ Responsive design for mobile/tablet

### **Create Pages**
- ✅ Purple gradient header with subtitle
- ✅ Form sections with visual hierarchy
- ✅ Labeled input fields with placeholders
- ✅ Required field validation
- ✅ Error message display
- ✅ Submit and Cancel buttons
- ✅ Info box with helpful hints
- ✅ Responsive form layout

### **Edit Pages**
- ✅ Same layout as create pages
- ✅ Pre-filled fields with current values
- ✅ Conditional fields (e.g., student info)
- ✅ Unique value validation (excluding current)
- ✅ Save and Cancel buttons
- ✅ Proper form method spoofing

### **Show/Details Pages**
- ✅ Gradient header with title
- ✅ Detail sections with labels
- ✅ Badge components for categories
- ✅ Formatted dates (M dd, Y)
- ✅ Edit and Back buttons
- ✅ Professional detail layout

---

## 🔑 Key Features

### **Form Validation**
- Required fields checked
- Unique values enforced (name, email)
- Email format validation
- Conditional validation (role-based)
- Real-time error messages

### **User Experience**
- Smooth transitions (0.3s ease)
- Hover effects on buttons and rows
- Focus states on inputs (ring shadow)
- Confirmation dialogs before delete
- Toast-like success messages
- Empty state messages
- Loading-friendly design

### **Navigation**
- Sidebar with active state
- Breadcrumb logic via routes
- Direct "Add New" access from list pages
- Back buttons on detail pages
- Cancel buttons on forms

### **Data Integrity**
- Cascade delete for related records
- Soft delete option (available)
- Foreign key constraints
- Unique field validation
- Form CSRF protection

---

## 📊 Quick Stats

| Metric | Count |
|--------|-------|
| **Total Routes** | 46 |
| **Total Controllers** | 5 |
| **Total Views** | 19 |
| **Total Models** | 5 |
| **CRUD Modules** | 5 |
| **Full CRUD Operations** | 5 |
| **Professional Styled Pages** | 19 |
| **Responsive Breakpoints** | 3 |

---

## 🎯 User Workflows

### **Workflow 1: Add and Manage Users**
```
Visit /admin/users 
→ Click "Add New User"
→ Fill form (name, email, password, role)
→ If Student, select class and roll number
→ Submit
→ Redirected to /admin/users
→ Click Edit to modify user
→ Click Delete to remove user
```

### **Workflow 2: Manage Exam Schedule**
```
Visit /admin/exams
→ Click "Add New Exam"
→ Enter exam name
→ Submit
→ Go to /admin/exam-subjects
→ Click "Assign Exam Subject"
→ Select Exam, Class, Subject, Marks
→ Submit
→ View, Edit, or Delete assignments
```

### **Workflow 3: Mark Attendance**
```
Visit /admin/attendance/create
→ Select class from dropdown
→ Select date
→ View all students in class
→ Mark Present/Absent for each student
→ Submit
→ View /admin/attendance/report
→ Filter by class and date
→ Export PDF or Excel
```

---

## 🔐 Admin Routes

All admin routes are protected with:
- ✅ Authentication middleware
- ✅ Admin role check
- ✅ CSRF token validation

---

## 📱 Responsive Breakpoints

- **Desktop** (1200px+) - Full layout with sidebar
- **Tablet** (768px-1199px) - Adjusted padding, smaller fonts
- **Mobile** (480px-767px) - Stack layout, flexible buttons
- **Small Mobile** (<480px) - Minimal padding, compact tables

---

## 💡 Tips & Tricks

1. **Search/Filter**: Use browser Ctrl+F to search within tables
2. **Bulk Delete**: Delete items one by one (add bulk operations in future)
3. **Export Data**: Use attendance report export for data analysis
4. **Undo Deletion**: Currently no undo (add soft delete if needed)
5. **User Profiles**: Student profile created automatically on user creation
6. **Exam Subjects**: Assign same exam to multiple classes
7. **Conditional Fields**: Student fields only show when role=student

---

## 🐛 Troubleshooting

| Issue | Solution |
|-------|----------|
| Form won't submit | Check all required fields filled |
| Unique constraint error | Value already exists, use different |
| Delete not working | Check deletion confirmation dialog |
| Edit not loading | Verify ID exists in database |
| Mobile layout broken | Clear browser cache, refresh page |
| Validation errors persist | Check field formats and limits |

---

## 📞 Support

For questions or issues:
1. Check validation messages
2. Verify all required fields
3. Check browser console for errors
4. Verify route exists
5. Check model relationships

---

**System Version:** 1.0  
**Last Updated:** January 1, 2026  
**Status:** ✅ Production Ready
