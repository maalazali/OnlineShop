import java.sql.*;
 
public class JavaSqlExample {
  public static void main(String args[]) {
    try {
      // Loads the class "oracle.jdbc.driver.OracleDriver" into the memory
      Class.forName("oracle.jdbc.driver.OracleDriver");
 
      // Connection details
      String database = "jdbc:oracle:thin:@oracle19.cs.univie.ac.at:1521:orclcdb";
      String user = "a12231169";
      String pass = "dbs23";
 
      // Establish a connection to the database
      Connection con = DriverManager.getConnection(database, user, pass);
      PreparedStatement pstmt = null;
 
      // Insert a single dataset into the table "person"
      try {
        con.setAutoCommit(false);
        String insertSql = "INSERT INTO empfehlenx (EmpfehlerProdukt, EmpfohleneProdukt) VALUES (?,?)";
        pstmt = con.prepareStatement(insertSql);

        try{
          pstmt = con.prepareStatement(insertSql);
          con.setAutoCommit(false);
          for (int i = 1; i <= 2000; i++) {
            short empfohleneProdukt = (short) ((i % 2000) + 1);
                if (empfohleneProdukt == i) {
                    empfohleneProdukt += 1;
                }
                if (empfohleneProdukt > 2000) {
                    empfohleneProdukt = 1; // Beginnen Sie wieder bei 1, wenn das Ende erreicht ist
                }
            pstmt.setShort(1, (short) i); 
            pstmt.setShort(2, empfohleneProdukt);         
            pstmt.addBatch();
        }
          int[] result = pstmt.executeBatch();
          System.out.println("The number of rows inserted: "+ result.length);
         con.commit();
        } catch(Exception e){
            e.printStackTrace();
            con.rollback();
        } finally{
            if(pstmt!=null){
              pstmt.close();
            }
            if(con!=null){
              con.close();
            }

        }
     
        //executeUpdate Method: Executes the SQL statement, which can be an INSERT, UPDATE, or DELETE statement

      } catch (Exception e) {
        System.err.println("Error while executing INSERT INTO statement: " + e.getMessage());
      }
 
      // Check number of datasets in person table
      ResultSet rs = pstmt.executeQuery("SELECT COUNT(*) FROM person");
      if (rs.next()) {
        int count = rs.getInt(1);
        System.out.println("Number of datasets: " + count);
      }
 
      // Clean up connections
      rs.close();
      pstmt.close();
      con.close();
    } catch (Exception e) {
      System.err.println(e.getMessage());
    }
  }
}