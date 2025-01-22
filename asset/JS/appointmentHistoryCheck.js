function goBack(userType)
{
    if (userType === 'patient')
    {
        window.location.href = '../view/patientDashboard.php';
    }
    
    else if (userType === 'doctor')
    {
        window.location.href = '../view/doctorDashboard.php';
    }
    
    else if (userType === 'admin')
    {
        window.location.href = '../view/adminDashboard.php';
    }
}