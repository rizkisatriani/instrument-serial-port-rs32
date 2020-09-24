﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.IO;
using System.IO.Ports;
using System.Threading;
using System.Threading.Tasks;
using System.Globalization;

namespace LabServices
{
    public class SerialConnection
    {

        public static bool portStatus;
        public static string _Value;
        public static string _PortMessage;
        public static string _portSetting;
        public static string _dataLog;
        public static string _Author;
        static SerialPort mySerialPort;
        static bool _continue;
        static Thread readThread;

        public static void PortOpen(string Config, string _author)
        {
            StringComparer stringComparer = StringComparer.OrdinalIgnoreCase;
            string message;
            string name;
            
            _portSetting = Config;
            _Author = _author;

            mySerialPort = new SerialPort();

            string[] LineConfig = new string[] { "" };
            //Config = "COM4|9600|8|None|One|XOnXOff";
            LineConfig = Config.Split('|');
            _continue = false;

            mySerialPort.PortName = LineConfig[0];
            mySerialPort.BaudRate = Int32.Parse(LineConfig[1]);
            mySerialPort.DataBits = Int32.Parse(LineConfig[2]);
            mySerialPort.Parity = (Parity)Enum.Parse(typeof(Parity), LineConfig[3]);
            mySerialPort.StopBits = (StopBits)Enum.Parse(typeof(StopBits), LineConfig[4]);
            mySerialPort.Handshake = (Handshake)Enum.Parse(typeof(Handshake), LineConfig[5]);
            mySerialPort.RtsEnable = true;

            mySerialPort.ReadTimeout = 500;
            mySerialPort.WriteTimeout = 500;

            if (cekportReady( mySerialPort.PortName ) == true)
            {
                if (TryOpenPort() == true)
                {
                    try
                    {
                        readThread = new Thread(Read);
                        readThread.Start();
                    }
                    catch (Exception ex)
                    {
                        Console.WriteLine("Error opening my port: {0}", ex.Message);
                        _PortMessage = "Error opening my port: " + ex.Message;
                    }

                }

            }
        }

        private static bool cekportReady()
        {
            throw new NotImplementedException();
        }

        public static void Read()
        {
            bool containsresult;
            bool containresultB;

            DateTime localDate;
            var culture = new CultureInfo("en-US");

            if (_continue == false)
            {
                readThread.Join();
                mySerialPort.Close();
            }

            while (_continue)
            {
                try
                {
                    string message = mySerialPort.ReadLine();
                    //string message = mySerialPort.ReadExisting();
                    if (message != "")
                    {
                        Console.WriteLine("VALUE : {0}", message);

                    }
                    
                    switch (_Author)
                    {
                        case "Moisture":
                            //kusus untuk moisrute harus di akali karena data yang di kirim per line
                            containsresult = message.Contains("Result");
                            containresultB = message.Contains("result");
                            if (containsresult || containresultB)
                            {
                                _Value = message;
                                localDate = DateTime.Now;
                                _dataLog = localDate.ToString(culture);
                            }
                            break;
                        case "Radwag3500":
                            containsresult = message.Contains("g");
                            if (containsresult) {
                                _Value = message;
                                localDate = DateTime.Now;
                                _dataLog = localDate.ToString(culture);
                            }
                            break;
                        case "ToledoME3002":
                            containsresult = message.Contains(" g");
                            if (containsresult) {
                                _Value = message;
                                localDate = DateTime.Now;
                                _dataLog = localDate.ToString(culture);
                            }
                            break;
                        case "Sucromat": 
                                _Value +=message;
                                localDate = DateTime.Now;
                                _dataLog = localDate.ToString(culture);
                         
                            break;
                        default:
                            _Value = message;
                            localDate = DateTime.Now;
                            _dataLog = localDate.ToString(culture);
                            break;
                    }
                   
                }
                catch (TimeoutException) { }
            }
        }

        public static Boolean TryOpenPort()
        {
            try
            {
                mySerialPort.Open();
                _continue = true;
                portStatus = true;
                _PortMessage = "port: " + mySerialPort.PortName + " OPEN";
                return true;
            }
            catch (Exception ex)
            {
                Console.WriteLine("Error opening my port: {0}", ex.Message);
                _PortMessage = "Error opening my port: "+ex.Message;
                _continue = false;
                portStatus = false;
                return false;
            }
        }

        public static void closePort()
        {
            _continue = false;
            portStatus = false;
            _PortMessage = "Port Close";
            readThread.Join();
            mySerialPort.Close();

        }

        public static Boolean cekportReady(string SetportName)
        {
            Boolean YesNo;

            YesNo = false;

            Console.WriteLine("Chek Available Ports:");
            try
            {
                foreach (string s in SerialPort.GetPortNames())
                {

                    if (SetportName == s)
                    {
                        YesNo = true;

                        break;
                    }
                }

                if (YesNo)
                {
                    Console.WriteLine(" PORT : {0} READY", SetportName);
                    _PortMessage = " PORT : " + SetportName + " OKE";

                }
                else
                {
                    _PortMessage = " PORT : " + SetportName + " NOT AVAILABLE";

                    Console.WriteLine(" PORT : {0} NOT AVAILABLE", SetportName);
                }

                portStatus = YesNo;

                return YesNo;

            }
            catch (Exception ex)
            {
                Console.WriteLine("Error opening my port: {0}", ex.Message);
                _PortMessage = "Error opening my port:"+ex.Message;
                return false;
            }
            
        }

        public static void write(string command)
        {
            mySerialPort.Write(command);
        }

    }
}
