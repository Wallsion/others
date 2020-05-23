#include <io.h>
#include <fstream>
#include <string>
#include <vector>
#include <iostream>
#include <direct.h>
#include <sstream>
using namespace std;

//获取特定格式的文件名
void GetAllFormatFiles(string path, vector<string>& files, string format)
{
	//文件句柄  
	intptr_t hFile = 0;
	//文件信息  
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
				files.push_back(p.assign(fileinfo.name));  //将文件路径保存，也可以只保存文件名:    p.assign(path).append("\\").append(fileinfo.name)
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
	//读取所有格式为txt的文件
	string format = ".txt";
	string filePath(buf1);
	filePath = filePath + "\\article";
	GetAllFormatFiles(filePath, files, format);
	if (files.size() == 0) {
		cout << "article目录没有文件" << endl;
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
	cout << "@author  Xinwang\n@词语数量统计，支持中英文，把需要统计的文件放在article目录" << endl << endl;
	cout << "*****输入需要统计的词语，多个以空格分开，换行结束输入*******" << endl;
	cout << "*****例如：输入 需要 统计 的 词语                    *******" << endl;
	cout << "************************************************************\n" << endl;
	ofile.open("统计结果.txt");
	if (!ofile.is_open())
		cout << "open file failure" << endl;
	for (int j = 0; j < files.size(); j++) {
		vector<string> arr;
		string strFind;
		cout << "读取的文件为： " << files[j] << endl;
		ofile << "[" << files[j] << "]" << endl;
		cout << "输入当前文件需要统计的词语:" << endl;
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