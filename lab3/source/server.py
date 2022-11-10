#!/usr/bin/env python3
import http.server
import socketserver
import os

#print('source code for "http.server":', http.server.__file__)

class web_server(http.server.SimpleHTTPRequestHandler):
    
    def do_GET(self):

        print(self.path)
        
        
        if self.path == '/':
            self.protocol_version = 'HTTP/1.1'
            self.send_response(404)
            self.send_header("Content-type", "text/html; charset=UTF-8")
            self.end_headers()            
            self.wfile.write(b"Hello World!\n")
        elif self.path.startswith('/str='):
        	self.protocol_version = 'HTTP/1.1'
            self.send_response(200)
            self.send_header("Content-type", "application/json")
            self.end_headers()
            
            test_string = self.path[5:]
            
            
            lowercase = 0
            uppercase = 0
            digit = 0
            special = 0
            
            for letter in test_string:
            	if ():
            		lowercase += 1
            	elif ():
            		lowercase += 1
            	elif ()
            		digit += 1
            	else
            		special += 1
        	
            
            
        else:
            super().do_GET()
    
# --- main ---

PORT = 4080

print(f'Starting: http://localhost:{PORT}')

tcp_server = socketserver.TCPServer(("",PORT), web_server)
tcp_server.serve_forever()
