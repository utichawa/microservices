package com.esprit.microservice;

import java.io.Serializable;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

@Entity
public class Categorie implements Serializable {
	private static final long serialVersionUID = 6;
	
	@Id
	@GeneratedValue
	private int id;
	private String name, description;
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getDescription() {
		return description;
	}
	public void setDescription(String description) {
		this.description = description;
	}
	
	public Categorie() {
		super();
		// TODO Auto-generated constructor stub
	}
	public Categorie(String name) {
		super();
		this.name = name;
	}
	
	
	

}
