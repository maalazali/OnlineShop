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
                String insertSql = "INSERT INTO KategorieX (KATEGORIE_ID, KATEGORIE_TYP, KATEGORIE_NAME) VALUES (?, ?, ?)";

                try{
                    pstmt = con.prepareStatement(insertSql);
                    con.setAutoCommit(false);
                    for (int i = 101; i <= 2000; i++) {
                      pstmt.setShort(1, (short) i); 
                      pstmt.setString(2, "Deko-Typ" + i);
                        pstmt.setString(3, "Name" + i);
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
            ResultSet rs = pstmt.executeQuery("SELECT COUNT(*) FROM cart");
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