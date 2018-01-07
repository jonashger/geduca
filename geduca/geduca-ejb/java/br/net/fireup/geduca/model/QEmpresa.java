package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QEmpresa is a Querydsl query type for Empresa
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QEmpresa extends EntityPathBase<Empresa> {

    private static final long serialVersionUID = -1840991983L;

    public static final QEmpresa empresa = new QEmpresa("empresa");

    public final StringPath cnpj = createString("cnpj");

    public final DateTimePath<java.util.Date> dataAlteracao = createDateTime("dataAlteracao", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataCriacao = createDateTime("dataCriacao", java.util.Date.class);

    public final NumberPath<Long> empresaPrincipal = createNumber("empresaPrincipal", Long.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath nomeFantasia = createString("nomeFantasia");

    public final StringPath razaoSocial = createString("razaoSocial");

    public QEmpresa(String variable) {
        super(Empresa.class, forVariable(variable));
    }

    public QEmpresa(Path<? extends Empresa> path) {
        super(path.getType(), path.getMetadata());
    }

    public QEmpresa(PathMetadata<?> metadata) {
        super(Empresa.class, metadata);
    }

}

