﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Web.Http;
using System.Net;
using System.Net.Http;
using System.Web.Http.Cors;

namespace LabServices
{
    //[EnableCors(origins: "http://localhost:8080/api/book/1", headers: "*", methods: "*")]
    public class BookController : ApiController
    {
        static List<Book> ourbooks;

        private static List<Book> InitBooks()
        {
            string MyIpStatic;
            string hostName = Dns.GetHostName(); // Retrive the Name of HOST  

            string myIP = Dns.GetHostByName(hostName).AddressList[0].ToString();
            //string myIP1; // = Dns.GetHostByName(hostName).AddressList[1].ToString();

            if (myIP == "")
            {
                MyIpStatic = Dns.GetHostByName(hostName).AddressList[1].ToString(); ;
            }
            else
            {
                MyIpStatic = myIP;
            }
 

            var booklist = new List<Book>();
            
            booklist.Add(new Book
            {
                Id = 1,
                Title = "PT Gunung Madu Plantations",
                Author = "IT-GMP@2019",
                COM_SET = SerialConnection._portSetting,
                COM_STATUS = SerialConnection.portStatus,
                COM_MESSAGE = SerialConnection._PortMessage,
                VALUE = SerialConnection._Value,
                DATA_LOG = SerialConnection._dataLog,
                HostName = hostName,
                LocalAddress = MyIpStatic


            });
            
            return booklist;
        }

        public IEnumerable<Book> Get()
        {
            return InitBooks();
        }

        //GET api/book/1
        //public Book Get(int Id)
        public Book Get(string Id)
        {

            string nama;
            ourbooks = InitBooks();
            nama = "";

            if (SerialConnection.portStatus)
            {
                SerialConnection.write(Id);
            }
            //SerialConnection.write(Id);
            //SerialConnection.write("help");
            var result = (from b in ourbooks
                          //where b.Id == Id
                          where b.Id == 1
                          select b).FirstOrDefault();
            
           
            if (result == null)
            {
                var resp = new HttpResponseMessage(HttpStatusCode.NotFound)
                {
                    Content = new StringContent(string.Format("No book with ID = {0}", Id)),
                    ReasonPhrase = "Book ID Not Found"
                };
                throw new HttpResponseException(resp);
            }

            if (Id.Equals("2"))
            {//Jika Sucromat yang ngirim
                SerialConnection._Value = "";
            }

            return result;
        }

        public void Post([FromBody]Book book)
        {
            //var booklist = new List<Book>();
            string[] lines = new string[] { book.VALUE };

            if (!SerialConnection.portStatus)
            {
                SerialConnection.PortOpen(book.COM_SET,book.Author);
            }

            if (SerialConnection.portStatus == false)
            {

                var resp = new HttpResponseMessage(HttpStatusCode.Forbidden)
                {
                    Content = new StringContent(string.Format("{0}", SerialConnection._PortMessage)),
                    ReasonPhrase = SerialConnection._PortMessage
                };

                throw new HttpResponseException(resp);
            }
            else
            {
                var resp = new HttpResponseMessage(HttpStatusCode.Created)
                {
                    Content = new StringContent(string.Format("{0}", SerialConnection._PortMessage)),
                    ReasonPhrase = SerialConnection._PortMessage
                };

                throw new HttpResponseException(resp);

            }
        }

        //PUT api/book/1
        public void Put(int Id, [FromBody]Book book)
        {
            var resp = new HttpResponseMessage(HttpStatusCode.Accepted);
            throw new HttpResponseException(resp);
        }

        //DELETE api/book/1
        public void Delete(int Id)
        {
            SerialConnection.closePort();
            var resp = new HttpResponseMessage(HttpStatusCode.OK);
            throw new HttpResponseException(resp);
            
        }


    }
}
