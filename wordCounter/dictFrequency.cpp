#include <io.h>
#include <fstream>
#include <string>
#include <vector>
#include <iostream>
#include <direct.h>
#include <sstream>
using namespace std;

//��ȡ�ض���ʽ���ļ���
void GetAllFormatFiles(string path, vector<string>& files, string format)
{
	//�ļ����  
	intptr_t hFile = 0;
	//�ļ���Ϣ  
	struct _finddata_t fileinfo;
	string p;
	if ((hFile = _findfirst(p.assign(path).append("\\*" + format).c_str(), &fileinfo)) != -1)
	{
		do
		{
			if ((fileinfo.attrib &  _A_SUBDIR))
			{
				if (strcmp(fileinfo.name, ".") != 0 && strcmp(fileinfo.name, "..") != 0)
				{
					//files.push_back(p.assign(path).append("\\").append(fileinfo.name) );
					GetAllFormatFiles(p.assign(path).append("\\").append(fileinfo.name), files, format);
				}
			}
			else
			{
				files.push_back(p.assign(fileinfo.name));  //���ļ�·�����棬Ҳ����ֻ�����ļ���:    p.assign(path).append("\\").append(fileinfo.name)
			}
		} while (_findnext(hFile, &fileinfo) == 0);

		_findclose(hFile);
	}
}

int countWordsNum(string article, string word) {
	int num = 0;
	int wordLen = word.length();
	for (unsigned int i = 0; i < article.length(); i++) {
		int j = 0;
		for (; j < wordLen; j++) {
			if (word[j] == article[i + j]) {
				continue;
			}
			else {
				break;
			}
		}
		if (j == wordLen) {
			num++;
		}
	}
	return num;
}
bool split(vector<string> &arr, string str) {
	vector<int> label;
	string strTmp = " ";
	if (str[0] != ' ') {
		str = strTmp + str;
	}
	if (str[str.length() - 1] != ' ') {
		str = str + " ";
	}
	for (int i = 0; i < str.length(); i++) {
		if (str[i] == ' ') {
			label.push_back(i);
		}
	}
	for (auto it = label.begin() + 1; it != label.end(); it++) {
		if (*it == 0) {
			continue;
		}
		else {
			if (*it - *(it - 1) == 1)
				continue;
			arr.push_back(str.substr(*(it - 1) + 1, *it - *(it - 1) - 1));
		}
	}
	return true;
}

int main()
{
	vector<string> files;
	vector<string> filesContent;
	char buf1[256];
	ifstream infile;
	ofstream ofile;
	_getcwd(buf1, sizeof(buf1));
	//��ȡ���и�ʽΪtxt���ļ�
	string format = ".txt";
	string filePath(buf1);
	filePath = filePath + "\\article";
	GetAllFormatFiles(filePath, files, format);
	if (files.size() == 0) {
		cout << "articleĿ¼û���ļ�" << endl;
		system("pause");
		return 0;
	}
	for (int i = 0; i < files.size(); i++)
	{
		string strTem("");
		string strText("");
		string filePre("article\\");
		infile.open(filePre + files[i]);
		if (!infile.is_open())
			cout << "open file failure" << endl;
		while (!infile.eof())
		{
			infile >> strTem;
			strText = strText + strTem;
		}
		filesContent.push_back(strText);
		infile.close();
	}
	cout << "@author  Xinwang\n@��������ͳ�ƣ�֧����Ӣ�ģ�����Ҫͳ�Ƶ��ļ�����articleĿ¼" << endl << endl;
	cout << "*****������Ҫͳ�ƵĴ������Կո�ֿ������н�������*******" << endl;
	cout << "*****���磺���� ��Ҫ ͳ�� �� ����                    *******" << endl;
	cout << "************************************************************\n" << endl;
	ofile.open("ͳ�ƽ��.txt");
	if (!ofile.is_open())
		cout << "open file failure" << endl;
	for (int j = 0; j < files.size(); j++) {
		vector<string> arr;
		string strFind;
		cout << "��ȡ���ļ�Ϊ�� " << files[j] << endl;
		ofile << "[" << files[j] << "]" << endl;
		cout << "���뵱ǰ�ļ���Ҫͳ�ƵĴ���:" << endl;
		getline(cin, strFind);
		split(arr, strFind);
		for (int i = 0; i < arr.size(); i++) {
			int tem = countWordsNum(filesContent[j], arr[i]);
			cout << arr[i] << ": " << tem << endl;
			ofile << arr[i] << ": " << tem << endl;
		}
		cout << "----------------------------------------------------------\n";
	}
	ofile.close();
	system("pause");
	return 0;
}