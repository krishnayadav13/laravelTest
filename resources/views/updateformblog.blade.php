
<form action="/updateblog" method="post">
    @csrf
    <input type="hidden" name="id" value={{$blog['id']}}>
    <label>
        Title:
    </label>
    <input type="text" name="Title" value={{$blog['title']}}>
    <br>
    <label>
        Description:
    </label>
    <input type="text" name="Description" value={{$blog['description']}}>
    <br>
    <label>
        StartDate:
    </label>
    <input type="text" name="StartDate" value={{$blog['start_date']}}>
    <br>
    <label>
        EndDate:
    </label>
    <input type="text" name="EndDate" value={{$blog['end_date']}}>
    <br>

    <label>
        IsActive:
    </label>
<input type="number" name="IsActive" value={{$blog['is_active']}}>
<br>
  
    <input type="submit">
    
    </form>